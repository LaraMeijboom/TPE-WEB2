<?php
class EditorView{
    public function showSeasonsAsEditor($seasons){
        $count = count($seasons);
        require './templates/editorSection.phtml';
    }
}