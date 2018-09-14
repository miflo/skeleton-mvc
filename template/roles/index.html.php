<?php 

include __DIR__ . "/../baseOpen.html.php"; ?>

<style> .demo-list-action {margin:auto;} </style>

<!-- Textfield with Floating Label -->


<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
        <li class="mdl-list__item mdl-grid center-items">
                <h3>Create Roles</h3>
        </li>
</ul>

<div class="mdl-grid">
<form method="post" action="roles/create">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
    <input class="mdl-textfield__input" type="text" name="name">
    <label class="mdl-textfield__label" for="sample3">Create Name Roles</label>
  </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" name="value">
    <label class="mdl-textfield__label" for="sample3">Create Value Roles</label>
  </div>

  <button class="mdl-list__item-secondary-action" href="./roles/create"><i class="material-icons">done</i></button>

  <input type="hidden" name="token" value="<?= $token ?>"></>
</form>
</div>





<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
        <li class="mdl-list__item mdl-grid center-items">
                <h3>Roles</h3>
        </li>
</ul>



<div class="demo-list-action mdl-list mdl-cell mdl-cell--6-col">
<?php foreach($roles as $role): ?>
<div class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">person</i>
      <span><?= $role->getValue() ?></span>
    </span>
    <a class="mdl-list__item-secondary-action" href="./roles/update/<?= $role->getId()?>?token=<?=$token ?>"><i class="material-icons">edit</i></a>
    <a class="mdl-list__item-secondary-action" href="./roles/delete/<?= $role->getId()?>?token=<?=$token ?>"><i class="material-icons">delete</i></a>

  </div>
  



<?php endforeach; ?>
</div>
<?php 

include __DIR__ . "/../baseClose.html.php"; ?>