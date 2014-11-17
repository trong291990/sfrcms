<?php
namespace Sfr\Crud;
use Illuminate\Database\Eloquent\Model;
class SfrModel extends Model {
    protected $fillable = array();
    
    /*$fields
    [ 
        [   'name'=>'field_name',
            'type' => 'textarea|editor|radio|text|email|password|checkbox|select',
            'rules' => 'required|min:6|max:30',
            'confirmed' => 'password (orther field)'
        ]
    ];
    */
    protected $fields = array();
    protected $listFields = array();
    protected $hiddenFields = array();
    protected $rulesValidate = array();
    public function setFieldOrder(Array $order){
        $this->fieldOrder = $order;
    }
    public function setListFields(Array $fields){
        $this->listFields = $fields;
    }
    public function setHiddenFields(Array $fields){
        $this->hiddenFields = $fields;
    }
    public function setFields(Array $fields){
        $this->fields = $fields;
        $fillable =array();
        $rulesValidate = array();
        foreach ($fields as $field) {
            if(!isset($field['confirmed'])){
                $fillable[] = $field['name'];
            }
            if(!isset($field['rules'])){
                $rulesValidate[] = array($field['name'] => $field['rules']);
            }
        }
        $this->fillable = $fillable;
        $this->rulesValidate = $rulesValidate;
    }
}
