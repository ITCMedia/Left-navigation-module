<?php
// Разделы магазина
	if (Core::moduleIsActive('shop'))
	{
	   $Shop_Controller_Show = new Shop_Controller_Show(
		  Core_Entity::factory('Shop', 1)
	   );

	  if (is_object(Core_Page::instance()->object)
	  && get_class(Core_Page::instance()->object) == 'Shop_Controller_Show')
	  {
		  $Shop_Controller_Show->addEntity(
			 Core::factory('Core_Xml_Entity')
				->name('current_group_id')
				->value(intval(Core_Page::instance()->object->group))
		  );
	  }

	   $Shop_Controller_Show
		  ->xsl(
			 Core_Entity::factory('Xsl')->getByName('МагазинЛевоеМеню')
		  )

		  //->itemsForbiddenTags(array('text'))
		  ->group(0)
		  ->groupsMode('all')
		  ->limit(0)
		  ->show();
	}
?>
