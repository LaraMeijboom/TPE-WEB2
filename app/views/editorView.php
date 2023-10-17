<?php
class EditorView{
    public function showEditorSection(){
        require './templates/editorSection.phtml';
    }
    
    function showItemsAsEditor($seasons, $chapters){
        $count = count($seasons);
        $count = count($chapters);
        require './templates/editorSection.phtml';
    }
    function showEditSeason($season_id){
        require './templates/editSeason.phtml';
    }
    function showEdit($seasons, $id, $chapters){
        require './templates/editChapter.phtml';
    }
}
?>
