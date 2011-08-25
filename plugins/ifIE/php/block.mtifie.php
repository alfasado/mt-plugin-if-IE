<?php
function smarty_block_mtifie( $args, $content, &$ctx, &$repeat ) {
    $ua = $_SERVER[ 'HTTP_USER_AGENT' ];
    if ( preg_match( '/MSIE\s[1-9]{1,2}\.[0-9]{1}/', $ua, $matches ) ) {
        if ( count($args) == 0 ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        $ua = $matches[0];
        $ua = str_replace( 'MSIE ', '', $ua );
        $version = $args[ 'version' ];
        if ( $version && $version == $ua ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        $lt = $args[ 'lt' ];
        if ( $lt && $lt > $ua ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        $lte = $args[ 'lte' ];
        if ( $lte && $lte >= $ua ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        $gt = $args[ 'gt' ];
        if ( $gt && $gt < $ua ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        $gte = $args[ 'gte' ];
        if ( $gte && $gte <= $ua ) {
            return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, TRUE );
        }
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    } else {
        return $ctx->_hdlr_if( $args, $content, $ctx, $repeat, FALSE );
    }
}
?>