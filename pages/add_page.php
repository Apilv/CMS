<?php
function addNewPage($entityManager)
{
    if ($_POST["addNewPage"]) {

        $page_name = ($_POST["pageName"]);
        $page_content = ($_POST["pageContent"]);

        $new_page = new Pages();
        $new_page->setName($page_name);
        $new_page->setContent($page_content);
        $entityManager->persist($new_page);
        $entityManager->flush();
        header('Location: ./index.php?add');
    }
    if (isset($_GET["addPage"])) {
        echo
            '<form action="" method="post">
          Project Name
          <input type="text" name="pageName" required>
          Content
          <input type="text" name="pageContent" required>
          <input type="submit" name="addNewPage" value="Add">
      </form>';
    }
}