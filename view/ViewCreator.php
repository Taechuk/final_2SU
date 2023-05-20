<?php

class ViewCreator{
    private string $template;
    private array $fields;

    function __construct(string $template, array $fields = array()){
        $this->template = $template;
        $this->fields = $fields;
    }

    function assign($field, $value){
        $this->fields[$field] = $value;
    }

    function assignSeveral(array $varsToAssign){
        $this->fields = array_merge($this->fields, $varsToAssign);
    }

    function render(){
        extract($this->fields);
        ob_start();
        require $this->template;
        return ob_get_clean();
    }

}
?>