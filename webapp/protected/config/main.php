<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// define path to assets
Yii::setPathOfAlias('assets', realpath(dirname(__FILE__) . '/../../assets'));

// check environment dev or production
if (strpos(getenv("SERVER_SOFTWARE"), 'Development') === 0) {
    define('ENV_DEV', true); // we are on development machine
} else {
    define('ENV_DEV', false); // we are on production server
}


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'language' => 'ru',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii on Google App Engine',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yii',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
        'rights'=>array(
			'superuserName'=>'Admin', // Name of the role with super user privileges.
			'authenticatedName'=>'Authenticated', // Name of the authenticated user role.
			'userClass' => 'Admins',
			'userIdColumn'=>'id', // Name of the user id column in the database.
			'userNameColumn'=>'email', // Name of the user name column in the database.
			'enableBizRule'=>true, // Whether to enable authorization item business rules.
			'enableBizRuleData'=>false, // Whether to enable data for business rules.
			'displayDescription'=>true, // Whether to use item description instead of name.
			'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
			'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
			'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
			'layout'=>'rights.views.layouts.main', // Layout to use for displaying Rights.
			'appLayout'=>'application.views.layouts.main', // Application layout.
			'cssFile'=>'rights.css', // Style sheet file to use for Rights.
			'install'=>false, // Whether to enable installer.
			'debug'=>false,
		),
	),

	// application components
	'components'=>array(
        'assetManager'=>array(
            // This is special Asset Manger which can work under Google App Engine
            'class'=>'application.components.CGAssetManager',
            // CHANGE THIS: Enter here your own Google Cloud Storage bucket name Google App Engine
            'basePath'=>ENV_DEV
                    ? Yii::getPathOfAlias('assets')   // basePath for development version, assets path alias was defined above
                    : 'gs://yii-assets',    // basePath for production version
            // CHANGE THIS: All files on Google Cloud Storage can be accessed via the URL below,
            // note the bucket name at the end, should be the same as in basePath above
            'baseUrl'=>ENV_DEV
                    ? '/assets'                                            // baseUrl for development App Engine
                    : 'http://commondatastorage.googleapis.com/yii-assets' // baseUrl for production App Engine

        ),
        'request'=>array(
            'baseUrl' => '/',
            'scriptUrl' => '/',
        ),
		'urlManager'=>array(
			'urlFormat'=>'path',
            'baseUrl'=>'', // added to fix URL issues under Google App Engine
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// uncomment the following to use a MySQL database
		'db'=>array(
			'class'=>'system.db.CDbConnection',
			'connectionString' => ENV_DEV
                    // local development server connection string
                    ? 'mysql:host=localhost;dbname=gcadmin'
                    // App Engine Cloud SQL connection string
                    // explanation:
                    // yii-framework - here is a name of App Engine project
                    // db - here is the name of Cloud SQL instance
                    : 'mysql:unix_socket=/cloudsql/yii-framework:db;charset=utf8',
			'emulatePrepare' => true,
			'username' => 'gcadmin',
			'password' => 'gcadmin',
			'charset' => 'utf8',
		),
		'db_vsht'=>array(
			'class'=>'system.db.CDbConnection',
			'connectionString' => ENV_DEV
                    // local development server connection string
                    ? 'mysql:host=localhost;dbname=vsht'
                    // App Engine Cloud SQL connection string
                    // explanation:
                    // yii-framework - here is a name of App Engine project
                    // db - here is the name of Cloud SQL instance
                    : 'mysql:unix_socket=/cloudsql/yii-framework:db;charset=utf8',
			'emulatePrepare' => true,
			'username' => 'vsht',
			'password' => 'vsht',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
//					'class'=>'CFileLogRoute', // default
					'class'=>'CSyslogRoute', // log errors to syslog (supported by Google App Engine)
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'user'=>array(
			'class'=>'RWebUser',
			'allowAutoLogin' => true,
			'loginUrl'=>array('site/login'),
		),
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'defaultRoles' => array('Guest')
		),
		'ih'=>array(
				'class'=>'CImageHandler',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
