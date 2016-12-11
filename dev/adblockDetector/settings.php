//<?php

// Translatable message
$form->add( new \IPS\Helpers\Form\Translatable( 'adblockDetector_message', NULL, TRUE, array( 'app' => 'core', 'key' => 'adblockDetector_messageTranslate', 'editor' => array( 'app' => 'core', 'key' => 'Admin', 'autoSaveKey' => 'adblockDetector_message', 'minimize' => 'adblockDetector_messagePlaceholder' ) ) ) );

// Message type
$form->add( new \IPS\Helpers\Form\Select( 'adblockDetector_messageType', \IPS\Settings::i()->adblockDetector_messageType, FALSE, array( 'options' => array( 'information' => 'adblockDetector_messageTypeInformation', 'success' => 'adblockDetector_messageTypeSuccess', 'warning' => 'adblockDetector_messageTypeWarning', 'error' => 'adblockDetector_messageTypeError' ) ) ) );

// Help topic
$form->add( new \IPS\Helpers\Form\YesNo( 'adblockDetector_enableHelpLink', \IPS\Settings::i()->adblockDetector_enableHelpLink, FALSE, array( 'togglesOn' => array( 'adblockDetector_helpLink' ) ) ) );

// Help topic
$form->add( new \IPS\Helpers\Form\Text( 'adblockDetector_helpLink', \IPS\Settings::i()->adblockDetector_helpLink, FALSE, array(), NULL, NULL, NULL, 'adblockDetector_helpLink' ) );

// Groups
$form->add( new \IPS\Helpers\Form\Select( 'adblockDetector_groups', \IPS\Settings::i()->adblockDetector_groups == '*' ? "*" : explode( ',', \IPS\Settings::i()->adblockDetector_groups ), FALSE, array( 'options' => \IPS\Member\Group::groups(), 'parse' => 'normal', 'multiple' => true, 'unlimited' => '*', 'unlimitedLang' => 'all_groups' ), NULL, NULL, NULL, 'adblockDetector_groups' ) );

if ( $values = $form->values() )
{
	$form->saveAsSettings();
	\IPS\Lang::saveCustom( 'core', 'adblockDetector_messageTranslate', $values['adblockDetector_message'] );

	return TRUE;
}

return $form;