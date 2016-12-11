//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class hook35 extends _HOOK_CLASS_
{

/* !Hook Data - DO NOT REMOVE */
public static function hookData() {
 return array_merge_recursive( array (
  'globalTemplate' => 
  array (
    0 => 
    array (
      'selector' => '#ipsLayout_header',
      'type' => 'add_before',
      'content' => '{template="adblockDetector" group="plugins" location="global" app="core"}',
    ),
    1 => 
    array (
      'selector' => 'html > head',
      'type' => 'add_inside_end',
      'content' => '<script>var fuckAdBlock = undefined;</script>
{{$fuckAdblock = str_replace( \'%5C\', \'/\', \IPS\Theme::i()->resource( \'plugins/fuckadblock.min.js\', \'core\', \'global\' ) );}}
<script src="{$fuckAdblock}"></script>
<script>
    $( document ).ready( function() {
        var adBlockDetected = function() {
            $( \'#adBlockDetectedMessage\' ).removeClass( \'ipsHide\' );
            $( \'body\' ).addClass( \'adblockDetected\' );
        }
        var adBlockUndetected = function() {
            $( \'#adBlockDetectedMessage\' ).addClass( \'ipsHide\' );
            $( \'body\' ).removeClass( \'adblockDetected\' );
        }

        if( ips.utils.cookie.get( \'adblockDetectedMessage_dismiss\' ) != \'yes\' )
        {
            if ( typeof fuckAdBlock === \'undefined\' )
            {
                adBlockDetected;
            }
            else
            {
                fuckAdBlock.debug.set( true ).on( true, adBlockDetected ).on( false, adBlockUndetected );
            }
        }
    });
</script>',
    ),
  ),
), parent::hookData() );
}
/* End Hook Data */


}
