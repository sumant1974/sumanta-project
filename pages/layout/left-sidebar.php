<?php
  function isActive($menu, $mode="full"){
    global $active_menu;
    if ($mode == "partial")
      echo ($active_menu == $menu? "active": "");
    else
      echo ($active_menu == $menu? "class='active'": "");
  }
  function parseNodes($nodes) {
    $ul = "<ul class='sidebar-menu'>\n<li class='header'>MAIN NAVIGATION</li>";
    foreach ($nodes as $node) {
            $ul .= parseNode($node);
    }
    $ul .= "</ul>\n";
    return $ul;
}
function parseChildNodes($nodes) {
  $ul = "<ul class='treeview-menu'>\n";
  foreach ($nodes as $node) {
          $ul .= parseChildNode($node);
  }
  $ul .= "</ul>\n";
  return $ul;
}
function parseNode($node) {
    $li = "\t<li>";
    $li .= "<a href='" . $node->link . "'><i class='".$node->iclass."'></i><span>" . $node->name. "</span></a>";
    if (isset($node->sub)) $li .= parseChildNodes($node->sub);
    $li .= "</li>\n";
    return $li;
}
function parseChildNode($node) {
  $li = "\t<li ". isActive($node->name) .">";
  $li .= "<a href='".$node->link."'><i class='".$node->iclass."'></i>".$node->name."</a>";
  if (isset($node->sub)) $li .= parseChildNodes($node->sub);
  $li .= "</li>\n";
  return $li;
}
//echo $auth->menu;
$nodes = json_decode($auth->menu);

$htmlmenu = parseNodes($nodes);
//echo $html;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://ui-avatars.com/api/?name=<?php echo $userinfo["firstname"]?>&rounded=true" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $userinfo["firstname"]." ".$userinfo["lastname"]?></p>
          <a href="pages/dashboard"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      .search form -->
      <?php echo $htmlmenu ?>
     
  </aside>
<script>
  var parent = $("ul.sidebar-menu li.active").closest("ul").closest("li");
  if (parent[0] != undefined)
    $(parent[0]).addClass("active");
</script>