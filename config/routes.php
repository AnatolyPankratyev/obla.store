<?php

use ishop\Router;

Router::add('^enter/?$', ['controller' => 'Enter', 'action' => 'view']);
Router::add('^props/?$', ['controller' => 'Props', 'action' => 'view']);
Router::add('^agreement/?$', ['controller' => 'Agreement', 'action' => 'view']);
Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);

// default routes
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');