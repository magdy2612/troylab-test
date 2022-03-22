<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model{
	use SoftDeletes;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'order', 'school_id',
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function getStudentOrder($school_id){
    	$order = DB::select("SELECT `order` FROM students WHERE school_id = '$school_id' ORDER BY `order` DESC LIMIT 1");
    	/*if(!empty($order) && isset($order[0]->order)){
    		$order = $order[0]->order + 1;
    	}
    	else
    		$order = 1;*/
    	return $order?$order[0]->order + 1:1;
    }

    public function save(array $options = array()){
    	if($this->school_id && !isset($this->order))
    		$this->order =  $this->getStudentOrder($this->school_id);

        return parent::save($options);
    }
}
