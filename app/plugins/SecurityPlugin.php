<?php
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Enum;
use Phalcon\Acl\Role;
use Phalcon\Acl\Adapter\Memory as AclList;


class SecurityPlugin extends Injectable
{

        public function beforeExecuteRoute(
            Event $event,
            Dispatcher $containerspatcher
        ){
            $auth = $this->session->get('auth');

            if (!$auth) {
                $role = 'Guests';
            } else {
                $role = 'Users';
            }

            $controller = $containerspatcher->getControllerName();
            $action     = $containerspatcher->getActionName();

            $acl = $this->getAcl();

            $allowed = $acl->isAllowed($role, $controller, $action);
            if (true !== $allowed) {
                $this->flash->error(
                    "You do not have access to this module"
                );

                $containerspatcher->forward(
                    [
                        'controller' => 'index',
                        'action'     => 'index',
                    ]
                );

                return false;
            }
        }

        public function getAcl()
        {
            $acl= new AclList();

            $acl->setDefaultAction(
                Enum::DENY
            );
            $roles= array(
                'users' => new Role ('Users'),
            'guests' => new Role ('Guests')
        );
    foreach ($roles as $role){
        $acl->addRole($role);
    }

            $usersResources = array(
                'index' => array('index'),
                ''
            );


foreach ($usersResources as $componentName => $actions) {
    $acl -> addComponent(
        new Component ($componentName),
        $actions
    );
}
            $publicResources = array(
                'index'      => array('index'),
                'about'      => array('index'),
                'register'   => array('index'),
                'errors'     => array('show401', 'show404', 'show500'),
                'session'    => array('index', 'register', 'start', 'end'),
                'contact'    => array('index', 'send'),
                'test'       => array('index') // Как-то так: test указывает на TestController, index - на indexAction
            );
foreach ($publicResources as $componentName => $actions) {
    $acl->addComponent(
        new Component($componentName),
        $actions
    );
}


foreach ($roles as $role) {
    foreach ($publicResources as $resource => $actions) {
        $acl->allow(
            $role->getName(),
            $resource,
            '*'
        );
    }
}

foreach ($usersResources as $resource => $actions) {
    foreach ($actions as $action) {
        $acl->allow(
            'Users',
            $resource,
            $action
        );
    }
}
        }
}