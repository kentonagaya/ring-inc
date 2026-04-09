<?php
/**
 * delete-excerpt-tag
 *
 * 抜粋の末尾で分割された特殊文字が残るのを修正
 *
 * @version 1.0
 * @since site theme X 10.0
 */

	function remove_broken_characters($text, $num_words, $more, $original_text){
		$planeExcerpt=html_entity_decode(wp_strip_all_tags($original_text),ENT_QUOTES);
		if($num_words < mb_strlen($planeExcerpt)){
			return htmlentities(mb_substr($planeExcerpt,0,$num_words),ENT_QUOTES).$more;
		}else{
			return htmlentities(mb_substr($planeExcerpt,0,$num_words),ENT_QUOTES);
		}
	}
	add_filter('wp_trim_words','remove_broken_characters',9999,4);