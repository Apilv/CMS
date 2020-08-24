<?php

function deletePage($entityManager)
{
    if (isset($_GET["deletePage"])) {
        $id = $_GET["deletePage"];
        $delete_page = $entityManager->find("Pages", $id);
        $entityManager->remove($delete_page);
        $entityManager->flush();
        header('Location: ./index.php?delete');
    }
}
