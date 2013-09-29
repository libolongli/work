<?php
	class module_report_api_report{
		private $_db;
		function __construct(){
		$this->_db = new db();
		}	

    function value($name)
    {
        return htmlspecialchars($this->string($name));
    }
    function string($name)
    {
        return strval($this->raw($name));
    }
    function raw($name)
    {
        if (isset($_POST[$name])) {
            return $this->dequote($_POST[$name]);
        } else {
            return null;
        }
    }
     function dequote($val)
    {
        if (get_magic_quotes_gpc()) {
            if (is_string($val)) {
                return stripslashes($val);
            } else if (is_array($val)) {
                return array_map(array($this, 'dequote'), $val);
            }
        }
        return $val;
    }

 function main()
    {
        if (!$this->checkPrereqs()) {
            $this->showForm();
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->handlePost();
        } else {
            $this->showForm();
        }
    }
     function warning($message, $submessage='')
    {
        print "<p class=\"error\">$message</p>\n";
        if ($submessage != '') {
            print "<p>$submessage</p>\n";
        }
    }
    function updateStatus($status, $error=false)
    {
        echo '<li' . ($error ? ' class="error"': '' ) . ">$status</li>";
    }
	function showForm()
    {
        global $dbModules;
        $post = new Posted();
        $dbRadios = '';
        $dbtype = $post->raw('dbtype');
        foreach (self::$dbModules as $type => $info) {
            if ($this->checkExtension($info['check_module'])) {
                if ($dbtype == null || $dbtype == $type) {
                    $checked = 'checked="checked" ';
                    $dbtype = $type; // if we didn't have one checked, hit the first
                } else {
                    $checked = '';
                }
                $dbRadios .= "<input type=\"radio\" name=\"dbtype\" id=\"dbtype-$type\" value=\"$type\" $checked/> $info[name]<br />\n";
            }
        }

        echo <<<E_O_T
    	<form method="post" action="install.php" class="form_settings" id="form_install">
        <fieldset>
            <fieldset id="settings_site">
                <legend>Site settings</legend>
                <ul class="form_data">
                    <li>
                        <label for="sitename">Site name</label>
                        <input type="text" id="sitename" name="sitename" value="{$post->value('sitename')}" />
                        <p class="form_guide">The name of your site</p>
                    </li>
                    <li>
                        <label for="fancy-enable">Fancy URLs</label>
                        <input type="radio" name="fancy" id="fancy-enable" value="enable" checked='checked' /> enable<br />
                        <input type="radio" name="fancy" id="fancy-disable" value="" /> disable<br />
                        <p class="form_guide" id='fancy-form_guide'>Enable fancy (pretty) URLs. Auto-detection failed, it depends on Javascript.</p>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="settings_db">
                <legend>Database settings</legend>
                <ul class="form_data">
                    <li>
                        <label for="host">Hostname</label>
                        <input type="text" id="host" name="host" value="{$post->value('host')}" />
                        <p class="form_guide">Database hostname</p>
                    </li>
                    <li>
                        <label for="dbtype">Type</label>
                        $dbRadios
                        <p class="form_guide">Database type</p>
                    </li>
                    <li>
                        <label for="database">Name</label>
                        <input type="text" id="database" name="database" value="{$post->value('database')}" />
                        <p class="form_guide">Database name</p>
                    </li>
                    <li>
                        <label for="dbusername">DB username</label>
                        <input type="text" id="dbusername" name="dbusername" value="{$post->value('dbusername')}" />
                        <p class="form_guide">Database username</p>
                    </li>
                    <li>
                        <label for="dbpassword">DB password</label>
                        <input type="password" id="dbpassword" name="dbpassword" value="{$post->value('dbpassword')}" />
                        <p class="form_guide">Database password (optional)</p>
                    </li>
                </ul>
            </fieldset>

            <fieldset id="settings_admin">
                <legend>Administrator settings</legend>
                <ul class="form_data">
                    <li>
                        <label for="admin_nickname">Administrator nickname</label>
                        <input type="text" id="admin_nickname" name="admin_nickname" value="{$post->value('admin_nickname')}" />
                        <p class="form_guide">Nickname for the initial StatusNet user (administrator)</p>
                    </li>
                    <li>
                        <label for="admin_password">Administrator password</label>
                        <input type="password" id="admin_password" name="admin_password" value="{$post->value('admin_password')}" />
                        <p class="form_guide">Password for the initial StatusNet user (administrator)</p>
                    </li>
                    <li>
                        <label for="admin_password2">Confirm password</label>
                        <input type="password" id="admin_password2" name="admin_password2" value="{$post->value('admin_password2')}" />
                    </li>
                    <li>
                        <label for="admin_email">Administrator e-mail</label>
                        <input id="admin_email" name="admin_email" value="{$post->value('admin_email')}" />
                        <p class="form_guide">Optional email address for the initial StatusNet user (administrator)</p>
                    </li>
                    <li>
                        <label for="admin_updates">Subscribe to announcements</label>
                        <input type="checkbox" id="admin_updates" name="admin_updates" value="true" checked="checked" />
                        <p class="form_guide">Release and security feed from <a href="http://update.status.net/">update@status.net</a> (recommended)</p>
                    </li>
                </ul>
            </fieldset>
            <input type="submit" name="submit" class="submit" value="Submit" />
        </fieldset>
    </form>
E_O_T;
    }
    function handlePost()
    {
        echo <<<STR
        <dl class="system_notice">
            <dt>Page notice</dt>
            <dd>
                <ul>
STR;
        $this->validated = $this->prepare();
        if ($this->validated) {
            $this->doInstall();
        }
        echo <<<STR
            </ul>
        </dd>
    </dl>
STR;
        if (!$this->validated) {
            $this->showForm();
        }
    }
      function prepare()
    {
        $post = new Posted();
        $this->host     = $post->string('host');
        $this->dbtype   = $post->string('dbtype');
        $this->database = $post->string('database');
        $this->username = $post->string('dbusername');
        $this->password = $post->string('dbpassword');
        $this->sitename = $post->string('sitename');
        $this->fancy    = (bool)$post->string('fancy');

        $this->adminNick    = strtolower($post->string('admin_nickname'));
        $this->adminPass    = $post->string('admin_password');
        $adminPass2         = $post->string('admin_password2');
        $this->adminEmail   = $post->string('admin_email');
        $this->adminUpdates = $post->string('admin_updates');

        $this->server = $_SERVER['HTTP_HOST'];
        $this->path = substr(dirname($_SERVER['PHP_SELF']), 1);

        $fail = false;
        if (!$this->validateDb()) {
            $fail = true;
        }

        if (!$this->validateAdmin()) {
            $fail = true;
        }
        
        if ($this->adminPass != $adminPass2) {
            $this->updateStatus("Administrator passwords do not match. Did you mistype?", true);
            $fail = true;
        }
        
        return !$fail;
     }

	
}








		
		





	
























