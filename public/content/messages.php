<?php
#content/home.php
require_once($_SERVER['DOCUMENT_ROOT'].'/../private/page-template.php');
# trick to execute 1st time, but not 2nd so you don't have an inf loop
if (!isset($TPL)) {
    $TPL = new PageTemplate();
    $TPL->PageTitle = "message book";
    $TPL->ContentBody = __FILE__;
    include $_SERVER['DOCUMENT_ROOT'].'/../private/page-layout.php';
    exit;
}
?>
<p class="first-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris interdum massa nunc, at laoreet nisl malesuada non. Praesent nec mi quis metus hendrerit dapibus nec sit amet est. Nam massa ipsum, laoreet sagittis felis id, blandit pellentesque sapien. Nulla facilisi. Nam quam turpis, accumsan vitae enim nec, faucibus sollicitudin velit. Phasellus dignissim, quam id mattis feugiat, justo nibh pretium urna, euismod mattis arcu quam eget quam. Cras nisi leo, rutrum non justo vel, porttitor porttitor tellus. Nunc est risus, condimentum a dui sed, viverra hendrerit justo.</p>
<p>Praesent feugiat nisl eu ante posuere porttitor. Sed id eros ornare, pulvinar leo et, iaculis turpis. In placerat, metus eget iaculis pellentesque, risus purus vulputate justo, vitae pharetra dolor ipsum nec enim. Fusce et elit laoreet, interdum felis in, iaculis diam. Praesent lorem justo, tincidunt ac vestibulum nec, semper ac risus. Pellentesque eu tristique arcu, vitae laoreet nunc. Donec posuere tellus a nisi congue tincidunt. Maecenas id vulputate massa.</p>
<p>Nullam egestas tempor fringilla. Vestibulum libero arcu, consectetur vitae dictum laoreet, placerat quis nunc. Vestibulum fringilla interdum venenatis. Nunc a ante eros. Nullam dolor est, sollicitudin id lobortis ut, pulvinar pulvinar mauris. Ut scelerisque urna lorem, id semper diam consectetur cursus. Donec at ipsum dictum, tincidunt massa non, vulputate orci. Vivamus ultrices massa lacus, non accumsan risus mattis nec. Etiam in tempus mi. Donec porttitor fringilla ante, ut ultricies urna auctor ac. Duis eget fermentum turpis. Fusce vitae augue eu neque cursus hendrerit. Ut dignissim consequat odio, non dignissim magna dignissim non. Aliquam massa sapien, consequat laoreet leo eu, rhoncus rhoncus augue.</p>
<p>Mauris feugiat sem nec justo lacinia commodo. Praesent mollis lobortis accumsan. Proin eget metus turpis. Aenean varius, arcu a pharetra commodo, mi tellus blandit arcu, et venenatis nisl massa eget lacus. Donec in neque blandit, lacinia est ut, volutpat sem. Morbi vulputate laoreet ullamcorper. Maecenas consectetur malesuada massa id varius. Nullam pharetra porttitor quam. Sed gravida lorem ut magna interdum, elementum hendrerit massa eleifend. Nunc consectetur at erat quis dapibus. Nunc et elementum erat. Aliquam ac tempor ligula, id ullamcorper erat. Duis non tincidunt neque. In mollis eleifend purus, sed gravida massa. Sed semper sed lorem non laoreet.</p>
