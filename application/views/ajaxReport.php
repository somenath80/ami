<!-- Products -->
<div class="row">
<?php foreach($books as $value):
$image_suffix = site_url("img_upload/$value->thumb_img&w=132&h=197");
?>

<div class="col-lg-4 col-xs-6 r-full-width">
	
	<div class="product-box">
		<a href="<?=site_url("bookdetails")."/".$value->id."/".$value->slug;?>">
		<div class="product-img">
			<!--<a class="btn-1 sm shadow-0 add-bag" href="javascript:;" onclick="addToCart('<?=$value->id?>','1','<?=$value->price?>','<?=$value->discount_price?>');">A</a>-->
			<img height="197" src="<?=site_url("image.php?src=$image_suffix");?>" alt="">
		</div>
		</a>
		<div class="product-detail">
			<a class="btn-1 sm shadow-0 add-bag" href="javascript:;" onclick="addToCart('<?=$value->id?>','1','<?=$value->price?>','<?=$value->discount_price?>');"><i class="fa fa-cart-plus"></i></a>
			<span>
				<a href="<?=site_url("bookdetails")."/".$value->id."/".$value->slug;?>">
				<?=substr($value->author,0,20)?>
				</a>
			</span>
			<h5>
				<a href="<?=site_url("bookdetails")."/".$value->id."/".$value->slug;?>">
				<?php echo $value->title;?>
				</a>
			</h5>
			
			<div class="rating-nd-price">
				<a href="<?=site_url("bookdetails")."/".$value->id."/".$value->slug;?>">
				<!--<strong>&#8377;<?=$value->price?></strong>-->
				<?php if($value->academictype == "nonacademic"){ ?>
					<?php if($value->nondiscount_price > 0 && $value->nondiscount_price < $value->nonprice){?>
					<span><strong>&#8377;<?=$value->nonprice?></strong></span>
					<div style="text-align: right;"><strong>&#8377;<?=$value->nondiscount_price?></strong></div>
					<?php }else{?>
					<strong>&#8377;<?=$value->nonprice?></strong>
					<?php }?>
				<?php }else{ ?>
					<?php if($value->discount_price > 0 && $value->discount_price < $value->price){?>
					<span><strong>&#8377;<?=$value->price?></strong></span>
					<div style="text-align: right;"><strong>&#8377;<?=$value->discount_price?></strong></div>
					<?php }else{?>
					<strong>&#8377;<?=$value->price?></strong>
					<?php }?>
				<?php }?>
				</a>
				
			</div>
		</div>
	</div>
	
</div>

<?php endforeach; ?>
</div>
<?php if($end == $numproduct): ?>
<div class="row" id="load_more_product">
<div class="col-lg-12 col-xs-12 r-full-width" id="load_button_<?=$displacement;?>" style="text-align:center"><button class="btn btn-primary" type="button" onclick="ajaxloadProducts('<?=$val?>','<?=$type?>','<?=$id?>','<?=$displacement?>', '<?=$end?>');" class="btn btn-default loadbtn">View More Books</button></div>
</div>
<?php else: ?>
<!-- Products -->
<div class="row">
	<div class="col-lg-12 col-xs-12 r-full-width" style="text-align:center">
	NO MORE RESULT FOUND
	</div>
</div>
<!-- Products -->
<?php endif; ?>
<!-- Products -->