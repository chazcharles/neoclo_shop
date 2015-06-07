<?php
	$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>
<style type="text/css">
.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 1px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  line-height: 1.428571429;
  text-decoration: none;
  color: #000;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  margin-left: -1px;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-bottom-left-radius: 0px; 
  border-top-left-radius: 0px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-bottom-right-radius: 0px;
  border-top-right-radius: 0px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  color: #FF0000;
  background-color: #eeeeee;
  border-color: #dddddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 2;
  color: #ffffff;
  background-color: #666666;
  border-color: #666666;
  cursor: default;
}
</style>

<?php if ($paginator->getLastPage() > 1): ?>
<div class="text-center">
	<ul class="pagination ">
			<?php echo $presenter->render(); ?>
	</ul>
</div>
<?php endif; ?>