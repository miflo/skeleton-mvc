<?php 

include __DIR__ . "/../baseOpen.html.php"; ?>

<ul class="mdl-grid demo-list-icon mdl-list mdl-cell--6-col">
        <li class="mdl-list__item mdl-grid center-items">
                <h3>Roles</h3>
        </li>
</ul>

<style> .demo-list-action {margin:auto;} </style>

<div class="demo-list-action mdl-list mdl-cell mdl-cell--6-col">
<?php foreach($roles as $role): ?>
<div class="mdl-list__item">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">person</i>
      <span><?= $role->getValue() ?></span>
    </span>
    <a class="mdl-list__item-secondary-action" href="./roles/update/<?= $role->getValue() ?>"><i class="material-icons">edit</i></a>
    <a class="mdl-list__item-secondary-action" href="./roles/delete/<?= $role->getValue() ?>"><i class="material-icons">delete</i></a>

  </div>
  



<?php endforeach; ?>
</div>
<?php 

include __DIR__ . "/../baseClose.html.php"; ?>