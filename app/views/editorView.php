<?php
class EditorView{
<<<<<<< HEAD
     function showItemsAsEditor($seasons, $chapters){
        $count = count($seasons);
        $count = count($chapters);
=======
    public function showEditorSection(){
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
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
