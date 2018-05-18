<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    
     protected $table = 'homeworks';
        protected $fillable = ['class_id', 'section_id', 'homework','status'];

        public function classes(){
        	return $this->hasOne('App\Model\ClassType','id','class_id');
        }
       Public function sectionTypes(){
       	return $this->hasOne('App\Model\SectionType','id','section_id');
       }
        /**
    	 * Get excerpt from string
    	 * 
    	 * @param String $str String to get an excerpt from
    	 * @param Integer $startPos Position int string to start excerpt from
    	 * @param Integer $maxLength Maximum length the excerpt may be
    	 * @return String excerpt
    	 */
    	public static function getExcerpt($str, $startPos = 0, $maxLength = 50) {
    		if(strlen($str) > $maxLength) {
    			$excerpt   = substr($str, $startPos, $maxLength - 6);
    			$lastSpace = strrpos($excerpt, ' ');
    			$excerpt   = substr($excerpt, 0, $lastSpace);
    			$excerpt  .= ' [...]';
    		} else {
    			$excerpt = $str;
    		}
    		
    		return $excerpt;
    	}
}
