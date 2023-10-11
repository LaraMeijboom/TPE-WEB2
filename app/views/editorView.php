<?php
class EditorView{

    function showSeasonsAsEditor($seasons){
        $count = count($seasons);
        require './templates/editorSection.phtml';
    }
}