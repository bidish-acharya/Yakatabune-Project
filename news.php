<?php
include "admin/process/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=x-euc">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="og:url" content="http://ebiyamaru.com/" />
<!--<meta property="og:image" content="">-->
<meta property="og:title" content="東京の屋形船・釣り船 ゑびや｜360°大パノラマの東京湾へ" />
<meta property="og:description" content="田町駅・三田駅より徒歩５分。平日10名様より貸切可。テレビや雑誌で話題の老舗割烹「若竹」がお届けする本格和食と船内で揚げる江戸前天ぷら。2.5時間のお台場、浅草東京スカイツリー遊覧。屋形船ゑびやが江戸東京、風情ある水辺の旅へお連れします。 " />
	
<meta name="keywords" content="屋形船,東京,ゑびや,田町,三田,芝浦,品川,東京観光,宴会,貸切" />


<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="fa/css/fontawesome-all.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" href="css/swiper.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
<title>東京の屋形船・釣り船 ゑびや｜360°大パノラマの東京湾へ</title>

</head>

<body>
	<div class="inner-banner news" id="banner">
	<div class="social-icons">
			<a href="#" target="_blank"><img src="images/fb.png"></a>
			<a href="#"><img src="images/twitter.png"></a>
		<a href="#"><img src="images/instagram.png"></a>
	</div>
	<div class="navbar-fixed fa-pull-right">
        <div class="menu-trigger text-center">    
		<a href="javascript:void(0)" class="fa-menu"><img src="images/menu-trigger.png"><span class="menu-text">menu</span></a>
			<a href="javascript:void(0)" class="fa-close"><img src="images/close-trigger.png" height="16"><span class="menu-text">close</span></a>
		</div>
		
		<div class="logo d-flex align-items-center"><img src="images/logo.png" class="pc-only"><img src="images/logo-sm.png" class="sm-only d-none" width="200"></div>
		<ul class="nav-desc c-black pc-only">
		<a href="#" class="standard-link"><li class="text-uppercase"><img src="images/nav-list-icon.png" class="pr-3">english</li></a></ul>
		
		
        </div>
		<a href="#" class="c-white"><div class="contact-link d-flex align-items-center pc-only">
			<i class="fas fa-angle-right pl-3"></i><p>お問い合わせ</p>
		</div></a>
		
        <div class="collapsible-navbar">
	<ul class="nav-list">
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">ゑびや瓦版</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">船のしつらえ</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">料理コースと乗船料金</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">選べるり遊覧プラン</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">舟遊びのすゝめ</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">ゑびやの釣り船</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4"><span class="text-uppercase">faq</span>とお役立ち情報</li></a>
		<a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">ご予約の流れと決め事</li></a>
        <a href="#"><li><img src="images/nav-list-icon.png" class="pr-4 text-capitalize">English Page</li></a>
        <a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">アクセス</li></a>
        <a href="#"><li><img src="images/nav-list-icon.png" class="pr-4">ご予約・お問い合わせ</li></a>
		</ul>

	</div>
		
	</div> 
    
    <div class="breadcrumb m-auto"><h5><span class="text-uppercase">top</span> <span class="mr-2 ml-2"> > </span><span>ゑびや瓦版</span></h5></div>
    
    
    <div class="container-fluid">
       <div class="news-section">
		<img src="images/news-icon.png" class="img-fluid d-block top-icon">

           <div class="row news-single-horizontal">
                <ul class="horizontal nav nav-tabs" role="tablist">
                    <?php $categoryList = getCategoryList($conn);
                        foreach($categoryList as $category) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#<?php echo $category['category']; ?>" data-toggle="tab" role="tab">
                            <?php echo $category['category']; ?>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#all" data-toggle="tab" role="tab">
                            All
                        </a>
                    </li>
                </ul>
           </div>
            
       </div>
        <div class="tab-content">
            <?php $categoryList = getCategoryList($conn);
                foreach($categoryList as $category) {
                        if ($category === reset($categoryList)) { ?>
                            <div class="tab-pane fade show active" role="tabpanel" id="<?php echo $category['category']; ?>">
                        <?php } else { ?>
                            <div class="tab-pane fade show" role="tabpanel" id="<?php echo $category['category']; ?>">
                        <?php } ?>
                            <div class="row option-menu-wrapper">
                                <?php $newsList = getNewsListLimit($conn, $pageNo, $noOfRecordsPerPage);
                                    foreach($newsList as $news) {
                                        if ($news['category'] == $category['id']) {
                                ?>
                                <div class="col-md-4 news-article">
                                    <img src="admin/uploads/<?php echo $news['photo']; ?>" class="img-fluid w-100">
                                    <div class="news-content maxCharacter">
                                    <h2><?php echo $news['title']; ?></h2>
                                        <p class="content">
                                            <?php echo $news['content']; ?>
                                        </p>
                                    </div>
                                    <a href="view-news.php?id=<?php echo $news['id']; ?>" class="text-primary">
                                        Read More
                                    </a><br>
                                        <p class="category-tag"><?php echo getCategory($conn, $news['category'])[0]['category']; ?></p>
                                        <p class="date_posted"><?php echo $news['date']; ?></p>
                                </div>
                                <?php }
                                    } ?>
                            </div>
                    </div>
            <?php } ?>
                    <div class="tab-pane fade show" role="tabpanel" id="all">
                        <div class="row option-menu-wrapper">
                            <?php $newsList = getNewsListLimit($conn, $pageNo, $noOfRecordsPerPage);
                            foreach($newsList as $news) {
                                    ?>
                                    <div class="col-md-4 news-article">
                                        <img src="admin/uploads/<?php echo $news['photo']; ?>" class="img-fluid w-100">
                                        <div class="news-content maxCharacter">
                                            <h2><?php echo $news['title']; ?></h2>
                                            <p class="content">
                                                <?php echo $news['content']; ?>
                                            </p>
                                        </div>
                                        <a href="view-news.php?id=<?php echo $news['id']; ?>" class="text-primary">
                                            Read More
                                        </a><br>
                                        <p class="category-tag"><?php echo getCategory($conn, $news['category'])[0]['category']; ?></p>
                                        <p class="date_posted"><?php echo $news['date']; ?></p>
                                    </div>
                                <?php } ?>
                        </div>
                    </div>
    </div>
        
    <div class="container-fluid">
        <div class="row">
        <div class="pagination">
<!--            --><?php //if(isset($_GET['page'])) { $page = $_GET['page']; } else { $page = 1; }
//            if($page > 5) { ?>
<!--                <a href="?page=--><?php //echo ($page - 5);?><!--"><i class="fas fa-angle-left"></i></a>-->
<!--            --><?php //} ?>
<!--            --><?php
//                $pageCount = 1;
//                while ($page <= $totalPages) {
//                    if($pageCount == 7) { break; } else { $pageCount++; }
//            ?>
<!--                <a href="?pageNo=--><?php //echo $page;?><!--"&page=--><?php //echo ?><!--><?php //echo $page; ?><!--</a>-->
<!--            --><?php //$page++;
//                } ?>
<!--            --><?php //if(($pageNo+5) < $totalPages) { ?>
<!--            <a href="?page=--><?php //echo ($page);?><!--&pageNo=--><?php //echo ($page);?><!--"><i class="fas fa-angle-right"></i></a>-->
<!--            --><?php //} ?><!-- -->
        </div>
</div>
        </div>

	
	<footer>
	<div class="container-fluid">
		<div class="row footer-bg position-relative">
			<a href="#banner"><span class="to-top pc-only"></span></a>
		
			<div class="col-md-6 footer-1">
				<div class="d-none sm-only dotted-both-w collapsible-content">
			<p class="toggle-trigger pt-3">
		  お料理内容 <img src="images/plus-icon-lg-w.png" class="icon-plus">
			</p>
					<div class="collapsible-navbar-price footer-collapsible">
					<ul class="nav-desc">
					<a href="#"><li>ゑびや瓦版</li></a>
					<a href="#"><li>船のしつらえ</li></a>
						<a href="#"><li>選べる料理コース</li></a>
						<a href="#"><li>選べる遊覧プラン</li></a>
						<a href="#"><li>舟遊びのすゝめ</li></a>
						<a href="#"><li>ゑびやの釣り船</li></a>
						<a href="#"><li>FAQとお役立ち情報</li></a>
					<a href="#"><li>ご予約の流れと決めごと</li></a>
					<a href="#"><li>プライバシーポリシー</li></a>
					<a href="#"><li class="text-capitalize">english page</li></a>
					<a href="#"><li>ご予約・お問い合わせ</li></a>
		</ul>
						</div>
					</div>
			<img src="images/logo-footer.png">
			<p class="pt-3 m-0">東京都港区芝浦３丁目１鹿島橋</p>
			<p class="digit m-0">03-3474-1222</p>
			<p class="m-0">(電話受付9:00〜21:00)</p>
			<div class="social-footer">
			<a href="#" target="_blank"><img src="images/fb-w.png"></a>
			<a href="#"><img src="images/tw-w.png"></a>
		<a href="#"><img src="images/ins-w.png"></a>
			</div>
				
				<a href="#banner" class="standard-link c-white d-none sm-only">
				<span class="d-block pt-5"><i class="fas fa-angle-up" style="font-size:21px;" id="top"></i></span>
				<span class="d-block pt-2 text-uppercase">top</span></a>
				
				
				<div class="footer-segment">
					<p> 当サイトの内容、テキスト、画像等の無断転載・無断使用を固く禁じます。</p>
					<p>Copyright © EBIYA, All rights reserved.</p>
			</div>
			
			
		</div>
			
			<div class="col-md-3 footer-2 pc-only">
				<ul class="footer-list">
					<a href="#"><li class="text-uppercase"><i class="fas fa-angle-right pr-3"></i>top</li></a>
					<a href="#"><li><i class="fas fa-angle-right pr-3"></i>ゑびや瓦版</li></a>
					<a href="#"><li><i class="fas fa-angle-right pr-3"></i>船のしつらえ</li></a>
						<a href="#"><li><i class="fas fa-angle-right pr-3"></i>料理コースと乗船料金</li></a>
						<a href="#"><li><i class="fas fa-angle-right pr-3"></i>選べる遊覧プラン</li></a>
						<a href="#"><li><i class="fas fa-angle-right pr-3"></i>舟遊びのすゝめ</li></a>
						<a href="#"><li><i class="fas fa-angle-right pr-3"></i>ゑびやの釣り船</li></a>
					</ul>
		</div>
			
			<div class="col-md-3 footer-3 pc-only">
				<ul class="footer-list">
					<a href="#"><li><i class="fas fa-angle-right pr-3"></i>FAQとお役立ち情報</li></a>
					<a href="#"><li><i class="fas fa-angle-right pr-3"></i>ご予約の流れと決めごと</li></a>
					<a href="#"><li><i class="fas fa-angle-right pr-3"></i>プライバシーポリシー</li></a>
					<a href="#"><li class="text-capitalize"><i class="fas fa-angle-right pr-3"></i>english page</li></a>
					<a href="#"><li><i class="fas fa-angle-right pr-3"></i>ご予約・お問い合わせ</li></a>
				</ul>
		</div>
			

			
		</div>
		
		</div>
	
	
	</footer>
	

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/swiper.min.js"></script>
<script src="js/parallax.min.js"></script>
<script>
	
	$( document ).ready(function(){
	$('.fa-close').hide();
		$(".collapsible-navbar").hide();
		$(".collapsible-navbar-price").hide();
		$('.fa-minus').hide();
	
	})
	
	$(".fa-menu").click(function(){
    $(".fa-close").show();
	$(".fa-menu").hide();
		$(".collapsible-navbar").slideToggle();
});
	
	$(".fa-close").click(function(){
    $(".fa-menu").show();
	$(".fa-close").hide();
		$(".collapsible-navbar").hide("slide");
});
	
	$(".toggle-trigger").click(function(){
	$(this).next(".collapsible-navbar-price").slideToggle("0.3s");
    $('.fa-minus').toggle();
    $('.fa-plus').toggle();

});

	
	$("#to-top").click(function() {
    $('body').animate({
        scrollTop: $("#banner").offset().top
    }, 2000);
});
	



    
    </script>

    <script>
	 var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 40,
      centeredSlides: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
		 
		 navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    });
	
	</script>
    

</body>
</html>