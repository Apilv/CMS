<?php

function editPage($entityManager)
{
    if (isset($_POST["editPage"])) {
        $id = $_POST["pageId"];
        $page_name = $_POST["pageName"];
        $page_content = $_POST["pageContent"];
        $edit_page = $entityManager->find("Pages", $id);
        $edit_page->setName($page_name);
        $edit_page->setContent($page_content);
        $entityManager->flush();
        header('Location: ./index.php?delete');
    }


    if (isset($_GET["editPage"])) {
        $page_id = $_GET["editPage"];
        $page_name = $_GET["pageName"];
        $page_content = $_GET["pageContent"];
        echo
            '<form action="" method="post">
                Page id<br>
                <input type="number" value="' . $page_id . '" name="pageId" readonly><br>
                Page Name<br>
                <input type="text" name="pageName" value="' . $page_name . '"><br>
                Page Content<br>
                <input type="text" name="pageContent" value="' . $page_content . '"><br>
                <input type="submit" name="editPage" value="Submit"><br>
            </form>';
    }
}

