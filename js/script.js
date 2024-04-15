
"use strict";

const $spBreakPoint = 768;

$(function () {
    /************************************ */
    // ハンバーガーメニュー/ドロワーメニュークリックイベント
    /************************************ */
    $(".js-hamburger,.js-drawer").click(function () {
      var hamburger = $('.js-hamburger');
      var drawerMenu = $(".js-drawer");
      hamburger.toggleClass("is-active");
      drawerMenu.toggleClass('is-active');
      $(".circle-bg").toggleClass('is-active');

      // WAI-ARIA設定
      if (drawerMenu.hasClass('is-active')) {
        hamburger.attr('aria-expanded', 'true');
        drawerMenu.attr('aria-hidden', 'false');
      }
      else{
        hamburger.attr('aria-expanded', 'false');
        drawerMenu.attr('aria-hidden', 'true');
      }
    });

    /************************************ */
    // トップページFV用スライダー
    /************************************ */
    const sliderFv = new Swiper(".slider__fv .swiper", {
        loop: true,
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        speed: 3000,
        allowTouchMove: false,
        autoplay: {
          delay: 2000,
        },
    });

    /************************************ */
    // 商品紹介用スライダー
    /************************************ */
    const sliderProducts = new Swiper(".js-slider__products .swiper", {
      loop: true,
      centeredSlides: true,
      spaceBetween: 30, // 画像の間の余白
      slidesPerView: 1.5, // 一度に表示する枚数
      speed: 5000, // ループの時間
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      // 前後の矢印
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        // スライドの表示枚数：500px以上の場合
        769: {
          spaceBetween: 35,
          slidesPerView: 3.8,
        },
      },
      on: {
        init: function () {
            var maxHeight = 0;
            var $slides = $(this.$el).find('.swiper-slide');
            $slides.each(function () {
                var slideHeight = $(this).height();
                if (slideHeight > maxHeight) {
                    maxHeight = slideHeight;
                }
            });
            $slides.css('height', maxHeight + 'px');
        },
        resize: function () {
            var $slides = $(this.$el).find('.swiper-slide');
            $slides.css('height', 'auto');
            var maxHeight = 0;
            $slides.each(function () {
                var slideHeight = $(this).height();
                if (slideHeight > maxHeight) {
                    maxHeight = slideHeight;
                }
            });
            $slides.css('height', maxHeight + 'px');
        }
      }  
   });

   /************************************ */
   // スクロール処理
   /************************************ */
    $(window).scroll(function () {
      var windowWidth = window.innerWidth;
      var header = $(".js-header");
      var fvSwipperObj = $(".js-swiper");
      var headerShopButton = $(".js-header-shop-button");
      var mvHeight = 0;

      if(fvSwipperObj.length > 0){
        // トップページのみSwipperの画像の高さを取得
        mvHeight = fvSwipperObj.height();
      }
      else{
        // トップページ以外は固定値
        mvHeight = 400;
      }
      var wHeight = $(window).height();
      var scrollAmount = $(window).scrollTop();

      // 左から右にフェード
      $('.fade-right-trigger').each(function () {
        var targetPosition = $(this).offset().top;
        if(scrollAmount > targetPosition - wHeight + 60) {
            $(this).addClass("fade-right");
        }
      });

      // 左から右にフェード
      $('.fade-left-trigger').each(function () {
        var targetPosition = $(this).offset().top;
        if(scrollAmount > targetPosition - wHeight + 60) {
            $(this).addClass("fade-left");
        }
      });

      // 下から上にフェード
      $('.fade-downup-trigger').each(function () {
        var targetPosition = $(this).offset().top;
        if(scrollAmount > targetPosition - wHeight + 60) {
            $(this).addClass("fade-downup");
        }
      });

      // 上から下にフェード
      $('.fade-updown-trigger').each(function () {
        var targetPosition = $(this).offset().top;
        if(scrollAmount > targetPosition - wHeight + 60) {
            $(this).addClass("fade-updown");
        }
      });

      // ヘッダーの表示変更
      if ($(this).scrollTop() > mvHeight) {
        // メインビューの高さを超えた場合
        headerShopButton.addClass("is-active");

        if (windowWidth >= $spBreakPoint) {
            header.css("position", "fixed");
            header.addClass("is-active");
        } else {
          headerShopButton.removeClass("is-active");

          if (windowWidth >= $spBreakPoint) {
            header.css("position", "static");
            header.removeClass("is-active");
          }
        }
      }
      else{
        headerShopButton.removeClass("is-active");
        header.css("position", "static");
        header.removeClass("is-active");     
      }

      // スマフォ表示の固定ボタン表示非表示設定
      var footerFixedMenu = $(".js-footer-shop-button");
      if(footerFixedMenu.length > 0)
      {
        if (windowWidth < $spBreakPoint) {
          if ($(this).scrollTop() > mvHeight) {
            footerFixedMenu.fadeIn(200);
          } else {
            footerFixedMenu.fadeOut(200);
          }  
        }
      }

      // PC版ページトップへ戻るボタン表示非表示設定
      var pageTopButton = $(".js-page-top-pc");
      if(pageTopButton.length > 0){
        if (windowWidth >= $spBreakPoint) {
          if ($(this).scrollTop() > mvHeight) {
            pageTopButton.fadeIn(200);
          } else {
            pageTopButton.fadeOut(200);
          }   
        }
      }
    });

    $(window).on('resize', function() {
      var windowWidth = window.innerWidth;
      var header = $(".js-header");

      // スマフォ表示の固定ボタン
      var mvHeight = 0;
      var fvSwipperObj = $(".js-swiper");
      if(fvSwipperObj.length > 0){
        mvHeight = fvSwipperObj.height();
      }
      else{
        mvHeight = 400;
      }
      var windowWidth = window.innerWidth;
      var footerFixedMenu = $(".js-footer-shop-button");
      var pageTopButton = $(".js-page-top-pc");
      footerFixedMenu.hide();
      
      if(footerFixedMenu.length > 0){
        if (windowWidth < $spBreakPoint) {
          if ($(this).scrollTop() > mvHeight) {
            footerFixedMenu.fadeIn(200);

            header.css("position", "static");
            header.removeClass("is-active");
          } 
          else {
            footerFixedMenu.fadeOut(200);
          }
        }
        else{
          if ($(this).scrollTop() > mvHeight) {
            header.css("position", "fixed");
            header.addClass("is-active");
          }
        }
      }
      else{
        footerFixedMenu.hide();      
      }

      // PC用ページトップに戻るボタン表示非表示設定
      if(pageTopButton.length > 0){
        if (windowWidth < $spBreakPoint) {
          pageTopButton.hide(); 
        }
        else{
          if ($(this).scrollTop() > mvHeight) {
            pageTopButton.show();
          } else {
            pageTopButton.hide(); 
          }           
        }
      }
    });

    // ページトップへ戻る
    const pageTop = $(".js-page-top");
    pageTop.click(function () {
      $("body, html").animate(
        {
          scrollTop: 0,
        },
        300
      );
      return false;
    });
  });