<?php
class EditorView{
     function showItemsAsEditor($seasons, $chapters){
        $count = count($seasons);
        $count = count($chapters);
        require './templates/editorSection.phtml';
    }
}