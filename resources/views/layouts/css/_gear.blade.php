@push('styles')
<style>
/* .pull-left {
	float: left !important;
} */

.gear-icon {
 width:50px;
 height:50px;
 display:inline-block;
 vertical-align:middle;
 position:relative;
 width:50px;
 height:50px
}
.gear-icon:before {
 content:"";
 display:block;
 background:url(//swgoh.gg/static/img/ui/gear-atlas.png) no-repeat;
 position:absolute;
 top:0;
 left:0;
 right:0;
 bottom:0;
 z-index:2
}
.pull-left .gear-icon {
 /* margin-right:10px */
}
.gear-icon.gear-icon-micro {
 width:32px;
 height:32px
}
.gear-icon.gear-icon-micro .gear-icon-img {
 width:32px;
 height:32px
}
.gear-icon.gear-icon-micro.gear-icon-tier1:before {
 background-position:-32px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier2:before {
 background-position:-64px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier4:before {
 background-position:-96px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier7:before {
 background-position:-128px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier11:before {
 background-position:-160px -234px
}
.gear-icon.gear-icon-micro.gear-icon-tier12:before {
 background-position:-192px -234px
}
.gear-icon.gear-icon-small {
 width:40px;
 height:40px
}
.gear-icon.gear-icon-small .gear-icon-img {
 width:40px;
 height:40px
}
.gear-icon.gear-icon-small.gear-icon-tier1:before {
 background-position:-40px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier2:before {
 background-position:-80px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier4:before {
 background-position:-120px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier7:before {
 background-position:-160px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier11:before {
 background-position:-200px -194px
}
.gear-icon.gear-icon-small.gear-icon-tier12:before {
 background-position:-240px -194px
}
.gear-icon .gear-icon-img {
 width:50px;
 height:50px
}
.gear-icon.gear-icon-tier1:before {
 background-position:-50px -144px
}
.gear-icon.gear-icon-tier2:before {
 background-position:-100px -144px
}
.gear-icon.gear-icon-tier4:before {
 background-position:-150px -144px
}
.gear-icon.gear-icon-tier7:before {
 background-position:-200px -144px
}
.gear-icon.gear-icon-tier11:before {
 background-position:-250px -144px
}
.gear-icon.gear-icon-tier12:before {
 background-position:-300px -144px
}
.gear-icon.gear-icon-medium {
 width:64px;
 height:64px
}
.gear-icon.gear-icon-medium .gear-icon-img {
 width:64px;
 height:64px
}
.gear-icon.gear-icon-medium.gear-icon-tier1:before {
 background-position:-64px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier2:before {
 background-position:-128px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier4:before {
 background-position:-192px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier7:before {
 background-position:-256px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier11:before {
 background-position:-320px -80px
}
.gear-icon.gear-icon-medium.gear-icon-tier12:before {
 background-position:-384px -80px
}
.gear-icon.gear-icon-large {
 width:80px;
 height:80px
}
.gear-icon.gear-icon-large .gear-icon-img {
 width:80px;
 height:80px
}
.gear-icon.gear-icon-large.gear-icon-tier1:before {
 background-position:-80px 0
}
.gear-icon.gear-icon-large.gear-icon-tier2:before {
 background-position:-160px 0
}
.gear-icon.gear-icon-large.gear-icon-tier4:before {
 background-position:-240px 0
}
.gear-icon.gear-icon-large.gear-icon-tier7:before {
 background-position:-320px 0
}
.gear-icon.gear-icon-large.gear-icon-tier11:before {
 background-position:-400px 0
}
.gear-icon.gear-icon-large.gear-icon-tier12:before {
 background-position:-480px 0
}
.gear-icon.gear-icon-large .gear-icon-inner {
 border-radius:20px 2px 20px 14px
}
.gear-icon.gear-icon-large .gear-icon-mk-level {
 font-size:14px;
 font-weight:700;
 right:4px;
 top:4px
}
.gear-icon-link {
 position:absolute;
 top:0;
 left:0;
 right:0;
 bottom:0;
 z-index:3
}
.gear-icon-inner {
 display:block;
 background:radial-gradient(#aaa,black 80%);
 border-radius:13px 0 13px 7px;
 overflow:hidden
}
.gear-icon-tier1 .gear-icon-inner {
 background:radial-gradient(#4391a3,black 80%)
}
.gear-icon-tier2 .gear-icon-inner {
 background:radial-gradient(#4c9601,black 80%)
}
.gear-icon-tier4 .gear-icon-inner {
 background:radial-gradient(#004b65,black 80%)
}
.gear-icon-tier7 .gear-icon-inner {
 background:radial-gradient(#4700a7,black 80%)
}
.gear-icon-tier11 .gear-icon-inner {
 background:radial-gradient(#4700a7,black 80%)
}
.gear-icon-tier12 .gear-icon-inner {
 background:radial-gradient(#997300,black 80%)
}
.gear-icon-mk-level {
 position:absolute;
 right:2px;
 top:2px;
 color:#fff;
 z-index:10;
 font-size:8px;
 text-shadow:0 2px 2px #000;
 background-color:rgba(0,0,0,.3);
 padding:3px 3px 0;
 line-height:1
}


/* break */

.player-char-portrait {
 position:relative
}


/* break */

.star {
 position:absolute;
 bottom:50%;
 left:50%;
 width:15px;
 height:55px;
 color:#000;
 -webkit-transform-origin:center bottom;
 transform-origin:center bottom;
 background:center 0 transparent url(https://swgoh.gg/static/img/star.png) no-repeat;
 background-size:100%
}
.star-inactive {
 background-image:url(https://swgoh.gg/static/img/star-inactive.png)
}
.star1 {
 -webkit-transform:translateX(-50%) rotate(-60deg);
 transform:translateX(-50%) rotate(-60deg)
}
.star2 {
 -webkit-transform:translateX(-50%) rotate(-40deg);
 transform:translateX(-50%) rotate(-40deg)
}
.star3 {
 -webkit-transform:translateX(-50%) rotate(-20deg);
 transform:translateX(-50%) rotate(-20deg)
}
.star4 {
 -webkit-transform:translateX(-50%) rotate(0deg);
 transform:translateX(-50%) rotate(0deg)
}
.star5 {
 -webkit-transform:translateX(-50%) rotate(20deg);
 transform:translateX(-50%) rotate(20deg)
}
.star6 {
 -webkit-transform:translateX(-50%) rotate(40deg);
 transform:translateX(-50%) rotate(40deg)
}
.star7 {
 -webkit-transform:translateX(-50%) rotate(60deg);
 transform:translateX(-50%) rotate(60deg)
}
.character-image .star {
 height:55px
}
.character-gear-icon {
 width:80px;
 height:80px
}
.character-gear-icon-t1 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g1.svg)
}
.character-gear-icon-t2 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g2.svg)
}
.character-gear-icon-t3 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g3.svg)
}
.character-gear-icon-t4 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g4.svg)
}
.character-gear-icon-t5 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g5.svg)
}
.character-gear-icon-t6 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g6.svg)
}
.character-gear-icon-t7 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g7.svg)
}
.character-gear-icon-t8 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g8.svg)
}
.character-gear-icon-t9 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g9.svg)
}
.character-gear-icon-t10 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g10.svg)
}
.character-gear-icon-t11 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g11.svg)
}
.character-gear-icon-t12 {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g12.svg)
}
.character-image {
 width:80px;
 height:80px;
 background:transparent 100% no-repeat;
 background-size:cover;
 border-radius:50%;
 margin:0 auto 10px;
 position:relative
}
.character-level {
 color:#fff;
 font-weight:700;
 background-color:#264257;
 position:absolute;
 bottom:-5px;
 left:50%;
 -webkit-transform:translateX(-50%);
 transform:translateX(-50%);
 border:2px solid #fff;
 padding:0 5px;
 width:30px;
 text-align:center;
 border-radius:100%/130% 130% 15px 15px;
 box-shadow:0 1px 2px rgba(0,0,0,.25);
 text-shadow:-1px -1px 0 #000,2px -1px 0 #000,2px 2px 0 #000,-2px 2px 0 #000,2px 3px 0 #000,1px 3px 0 #000,2px 3px 0 #000
}
.character-list .character .light-side {
 background:#fff url(https://swgoh.gg/static/img/light-side-bg.png) no-repeat 100%
}
.character-list .character .dark-side {
 background:#fff url(https://swgoh.gg/static/img/dark-side-bg.png) no-repeat 100%
}
.character-list .character .preview {
 background:#fff url(https://swgoh.gg/static/img/preview.png) no-repeat 100%
}
.character-list .character:hover {
 background-color:#f9f9f9
}
.character-list .character-image {
 margin-right:15px
}
.character-list-image {
 border-radius:50%;
 width:30px;
 margin-right:5px
}
.panel-profile .panel-body.preview {
 background-image:url(https://swgoh.gg/static/img/preview.png)
}
.character-card.light-side {
 background-image:url(https://swgoh.gg/static/img/light-side.jpg)
}
.character-card.dark-side {
 background-image:url(https://swgoh.gg/static/img/dark-side.jpg)
}
.character-card.neutral,
.character-card.no-side {
 background-image:url(https://swgoh.gg/static/img/light-dark-side.png)
}
.char-portrait-list {
 display:flex;
 flex:1;
 flex-wrap:wrap
}
.char-portrait-list .char-portrait {
 margin:5px
}
.char-portrait {
 background-color:#000;
 border-radius:50px;
 position:relative;
 display:inline-block;
 vertical-align:top
}
.char-portrait-dark-side .char-portrait-image {
 border-color:#b03233;
 box-shadow:inset 0 0 3px 2px rgba(176,50,51,.8)
}
.char-portrait-light-side .char-portrait-image {
 border-color:#3f8cba;
 box-shadow:inset 0 0 3px 2px rgba(63,140,186,.8)
}
.char-portrait-micro {
 border-width:2px
}
.char-portrait-micro .char-portrait-image,
.char-portrait-micro .char-portrait-img {
 width:30px;
 height:30px
}
.char-portrait-xsmall {
 border-width:2px
}
.char-portrait-xsmall .char-portrait-image,
.char-portrait-xsmall .char-portrait-img {
 width:40px;
 height:40px
}
.char-portrait-small {
 border-width:2px
}
.char-portrait-small .char-portrait-image,
.char-portrait-small .char-portrait-img {
 width:50px;
 height:50px
}
.char-portrait-medium .char-portrait-image,
.char-portrait-medium .char-portrait-img {
 width:64px;
 height:64px
}
.char-portrait-large .char-portrait-image,
.char-portrait-large .char-portrait-img {
 width:100px;
 height:100px
}
.char-portrait-image {
 display:inline-flex;
 vertical-align:top;
 position:relative;
 overflow:hidden;
 width:80px;
 height:80px;
 border-radius:50%;
 border:3px solid #333;
 background-color:#000;
 box-shadow:inset 0 0 3px 2px rgba(0,0,0,.8)
}
.char-portrait-img {
 width:80px;
 height:80px;
 position:absolute;
 top:50%;
 left:50%;
 -webkit-transform:translate(-50%,-50%);
 transform:translate(-50%,-50%);
 background-color:#111
}
.char-portrait-gear-ready {
 position:absolute;
 background-color:#32cd32;
 width:14px;
 height:14px;
 right:0;
 top:-1px;
 z-index:10;
 border-radius:50%;
 border:2px solid #fff;
 box-shadow:0 0 3px rgba(0,0,0,.8)
}
.char-portrait-full {
 position:relative;
 width:80px;
 height:80px;
 background-color:#000;
 box-shadow:0 0 0 2px #555;
 border-radius:50%
}
.char-portrait-full-centered {
 margin:0 auto
}
.char-portrait-full-micro,
.char-portrait-full-micro .char-portrait-full-gear,
.char-portrait-full-micro .char-portrait-full-img {
 width:35px;
 height:35px
}
.char-portrait-full-micro .char-portrait-full-level {
 font-size:8px;
 padding:0 3px;
 border-radius:100%/130% 130% 9px 9px;
 border-width:1px;
 width:auto
}
.char-portrait-full-micro .star {
 width:7px;
 height:26px
}
.char-portrait-full-small,
.char-portrait-full-small .char-portrait-full-gear,
.char-portrait-full-small .char-portrait-full-img {
 width:50px;
 height:50px
}
.char-portrait-full-small .char-portrait-full-level {
 font-size:11px;
 width:25px;
 padding:0
}
.char-portrait-full-small .star {
 width:11px;
 height:38px
}
.char-portrait-full-large,
.char-portrait-full-large .char-portrait-full-gear,
.char-portrait-full-large .char-portrait-full-img {
 width:100px;
 height:100px
}
.char-portrait-full-large .star {
 width:19px;
 height:69px
}
.char-portrait-full-large .char-portrait-full-level {
 font-size:16px;
 width:35px
}
.char-portrait-full-large .char-portrait-full-gear-level {
 font-size:14px;
 width:30px;
 left:78%
}
.char-portrait-full-full-link {
 display:block
}
.char-portrait-full-empty {
 background-color:#ccc;
 box-shadow:0 0 0 2px #aaa
}
.char-portrait-full-img {
 width:80px;
 height:80px;
 border-radius:50%;
 background-color:#000
}
.char-portrait-full-gear {
 position:absolute;
 width:80px;
 height:80px;
 z-index:2;
 top:0;
 left:0
}
.char-portrait-full-gear-t1 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g1.svg)
}
.char-portrait-full-gear-t2 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g2.svg)
}
.char-portrait-full-gear-t3 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g3.svg)
}
.char-portrait-full-gear-t4 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g4.svg)
}
.char-portrait-full-gear-t5 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g5.svg)
}
.char-portrait-full-gear-t6 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g6.svg)
}
.char-portrait-full-gear-t7 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g7.svg)
}
.char-portrait-full-gear-t8 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g8.svg)
}
.char-portrait-full-gear-t9 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g9.svg)
}
.char-portrait-full-gear-t10 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g10.svg)
}
.char-portrait-full-gear-t11 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g11.svg)
}
.char-portrait-full-gear-t12 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g12.svg)
}
.char-portrait-full-gear-t13 .char-portrait-full-gear {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g13.svg)
}
.char-portrait-full-gear-level,
.char-portrait-full-level {
 position:absolute;
 -webkit-transform:translate(-50%);
 transform:translate(-50%);
 color:#fff;
 font-weight:700;
 background-color:#264257;
 border:2px solid #fff;
 text-align:center;
 border-radius:100%/130% 130% 15px 15px;
 box-shadow:0 1px 2px rgba(0,0,0,.5);
 text-shadow:-1px -1px 0 #000,2px -1px 0 #000,2px 2px 0 #000,-1px 2px 0 #000,2px 3px 0 #000,1px 3px 0 #000,2px 3px 0 #000
}
.char-portrait-full-level {
 position:absolute;
 bottom:-5px;
 left:50%;
 z-index:4;
 width:30px;
 padding:0 5px
}
.char-portrait-full-gear-level {
 left:80%;
 bottom:0;
 font-size:12px;
 min-width:26px;
 padding:0 6px 0 5px;
 z-index:2;
 box-shadow:0 1px 2px rgba(0,0,0,.5),inset 0 0 8px 1px rgba(0,0,0,.5)
}
.char-portrait-full-zeta {
 background:50% transparent url(https://swgoh.gg/static/img/assets/tex.skill_zeta.png) no-repeat;
 background-size:contain;
 width:50px;
 height:40px;
 position:absolute;
 top:36px;
 z-index:4;
 left:-14px;
 color:#fff;
 text-align:center;
 line-height:35px;
 font-size:11px
}
.char-portrait-full-gear-t1 .char-portrait-full-gear-level {
 background-color:#a5d0da
}
.char-portrait-full-gear-t2 .char-portrait-full-gear-level,
.char-portrait-full-gear-t3 .char-portrait-full-gear-level {
 background-color:#98fd33
}
.char-portrait-full-gear-t4 .char-portrait-full-gear-level,
.char-portrait-full-gear-t5 .char-portrait-full-gear-level,
.char-portrait-full-gear-t6 .char-portrait-full-gear-level {
 background-color:#00bdfe
}
.char-portrait-full-gear-t7 .char-portrait-full-gear-level,
.char-portrait-full-gear-t8 .char-portrait-full-gear-level,
.char-portrait-full-gear-t9 .char-portrait-full-gear-level,
.char-portrait-full-gear-t10 .char-portrait-full-gear-level,
.char-portrait-full-gear-t11 .char-portrait-full-gear-level {
 background-color:#9241ff
}
.char-portrait-full-gear-t12 .char-portrait-full-gear-level {
 background-color:#fc3
}
.char-portrait-full-gear-t13 .char-portrait-full-gear-level {
 background-color:#f56820
}


/* break */


.portrait-stars__star {
 position:absolute;
 bottom:50%;
 left:50%;
 width:15px;
 height:55px;
 color:#000;
 -webkit-transform-origin:center bottom;
 transform-origin:center bottom;
 background:center 0 transparent url(https://swgoh.gg/static/img/star.png) no-repeat;
 background-size:100%
}
.portrait-stars__star--inactive {
 background-image:url(https://swgoh.gg/static/img/star-inactive.png)
}
.portrait-stars__star--pos-1 {
 -webkit-transform:translateX(-50%) rotate(-60deg);
 transform:translateX(-50%) rotate(-60deg)
}
.portrait-stars__star--pos-2 {
 -webkit-transform:translateX(-50%) rotate(-40deg);
 transform:translateX(-50%) rotate(-40deg)
}
.portrait-stars__star--pos-3 {
 -webkit-transform:translateX(-50%) rotate(-20deg);
 transform:translateX(-50%) rotate(-20deg)
}
.portrait-stars__star--pos-4 {
 -webkit-transform:translateX(-50%) rotate(0deg);
 transform:translateX(-50%) rotate(0deg)
}
.portrait-stars__star--pos-5 {
 -webkit-transform:translateX(-50%) rotate(20deg);
 transform:translateX(-50%) rotate(20deg)
}
.portrait-stars__star--pos-6 {
 -webkit-transform:translateX(-50%) rotate(40deg);
 transform:translateX(-50%) rotate(40deg)
}
.portrait-stars__star--pos-7 {
 -webkit-transform:translateX(-50%) rotate(60deg);
 transform:translateX(-50%) rotate(60deg)
}
.player-character-portrait {
 display:inline-flex;
 position:relative;
 width:80px;
 height:80px;
 border-radius:50%
}
.player-character-portrait__link {
 display:block
}
.player-character-portrait__image {
 display:inline-flex;
 vertical-align:top;
 position:relative;
 overflow:hidden;
 width:80px;
 height:80px;
 border-radius:50%;
 border:3px solid #333;
 background-color:#000;
 box-shadow:0 0 0 2px #555
}
.player-character-portrait__img {
 width:80px;
 height:80px;
 border-radius:50%;
 background-color:#000;
 position:absolute;
 top:50%;
 left:50%;
 -webkit-transform:translate(-50%,-50%);
 transform:translate(-50%,-50%)
}
.player-character-portrait__gear-overlay {
 position:absolute;
 width:80px;
 height:80px;
 z-index:2;
 top:0;
 left:0
}
.player-character-portrait__level {
 position:absolute;
 -webkit-transform:translate(-50%);
 transform:translate(-50%);
 color:#fff;
 font-weight:700;
 background-color:#264257;
 border:2px solid #fff;
 text-align:center;
 border-radius:100%/130% 130% 15px 15px;
 box-shadow:0 1px 2px rgba(0,0,0,.5);
 text-shadow:-1px -1px 0 #000,2px -1px 0 #000,2px 2px 0 #000,-1px 2px 0 #000,2px 3px 0 #000,1px 3px 0 #000,2px 3px 0 #000
}
.player-character-portrait__level--unit {
 bottom:-5px;
 left:50%;
 z-index:4;
 width:30px;
 padding:0 5px
}
.player-character-portrait__level--gear {
 left:80%;
 bottom:0;
 font-size:12px;
 min-width:26px;
 padding:0 6px 0 5px;
 z-index:2;
 box-shadow:0 1px 2px rgba(0,0,0,.5),inset 0 0 8px 1px rgba(0,0,0,.5)
}
.player-character-portrait__gear-ready {
 position:absolute;
 background-color:#32cd32;
 width:14px;
 height:14px;
 right:0;
 top:-1px;
 z-index:10;
 border-radius:50%;
 border:2px solid #fff;
 box-shadow:0 0 3px rgba(0,0,0,.8)
}
.player-character-portrait--size-micro,
.player-character-portrait--size-micro .player-character-portrait__gear-overlay,
.player-character-portrait--size-micro .player-character-portrait__image,
.player-character-portrait--size-micro .player-character-portrait__img {
 width:35px;
 height:35px
}
.player-character-portrait--size-micro .player-character-portrait__level {
 font-size:8px;
 padding:0 3px;
 border-radius:100%/130% 130% 9px 9px;
 border-width:1px;
 width:auto
}
.player-character-portrait--size-micro .portrait-stars__star {
 width:7px;
 height:26px
}
.player-character-portrait--size-small,
.player-character-portrait--size-small .player-character-portrait__gear-overlay,
.player-character-portrait--size-small .player-character-portrait__image,
.player-character-portrait--size-small .player-character-portrait__img {
 width:50px;
 height:50px
}
.player-character-portrait--size-small .player-character-portrait__level {
 font-size:11px;
 width:25px;
 padding:0
}
.player-character-portrait--size-small .portrait-stars__star {
 width:11px;
 height:38px
}
.player-character-portrait--size-large,
.player-character-portrait--size-large .player-character-portrait__gear-overlay,
.player-character-portrait--size-large .player-character-portrait__image,
.player-character-portrait--size-large .player-character-portrait__img {
 width:100px;
 height:100px
}
.player-character-portrait--size-large .portrait-stars__star {
 width:19px;
 height:69px
}
.player-character-portrait--size-large .player-character-portrait__level--unit {
 font-size:16px;
 width:35px
}
.player-character-portrait--size-large .player-character-portrait__level--gear {
 font-size:14px;
 width:30px;
 left:78%
}
.player-character-portrait--alignment-dark-side .player-character-portrait__image {
 border-color:#b03233;
 box-shadow:inset 0 0 3px 2px rgba(176,50,51,.8)
}
.player-character-portrait--alignment-light-side .player-character-portrait__image {
 border-color:#3f8cba;
 box-shadow:inset 0 0 3px 2px rgba(63,140,186,.8)
}
.player-character-portrait--gear-1 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g1.svg)
}
.player-character-portrait--gear-2 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g2.svg)
}
.player-character-portrait--gear-3 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g3.svg)
}
.player-character-portrait--gear-4 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g4.svg)
}
.player-character-portrait--gear-5 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g5.svg)
}
.player-character-portrait--gear-6 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g6.svg)
}
.player-character-portrait--gear-7 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g7.svg)
}
.player-character-portrait--gear-8 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g8.svg)
}
.player-character-portrait--gear-9 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g9.svg)
}
.player-character-portrait--gear-10 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g10.svg)
}
.player-character-portrait--gear-11 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g11.svg)
}
.player-character-portrait--gear-12 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g12.svg)
}
.player-character-portrait--gear-13 .player-character-portrait__gear-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g13.svg)
}
.player-character-portrait--gear-1 .player-character-portrait__level--gear {
 background-color:#a5d0da
}
.player-character-portrait--gear-2 .player-character-portrait__level--gear,
.player-character-portrait--gear-3 .player-character-portrait__level--gear {
 background-color:#98fd33
}
.player-character-portrait--gear-4 .player-character-portrait__level--gear,
.player-character-portrait--gear-5 .player-character-portrait__level--gear,
.player-character-portrait--gear-6 .player-character-portrait__level--gear {
 background-color:#00bdfe
}
.player-character-portrait--gear-7 .player-character-portrait__level--gear,
.player-character-portrait--gear-8 .player-character-portrait__level--gear,
.player-character-portrait--gear-9 .player-character-portrait__level--gear,
.player-character-portrait--gear-10 .player-character-portrait__level--gear,
.player-character-portrait--gear-11 .player-character-portrait__level--gear {
 background-color:#9241ff
}
.player-character-portrait--gear-12 .player-character-portrait__level--gear {
 background-color:#fc3
}
.player-character-portrait--gear-13 .player-character-portrait__level--gear {
 background-color:#f56820
}
.squad-template__table .squad-template__unit-cell {
 padding:0
}
.squad-template__unit-cell-content {
 padding:5px 7px;
 height:100%
}
.squad-template__unit-cell-content--passes-filter {
 background-color:#7ddd83
}
.squad-template__unit-cell-content--tier-12 {
 background-color:#fff1a7
}
.squad-template__unit-cell-content--tier-11 {
 background-color:#bd96bd
}
.squad-template__unit-cell-content--tier-7,
.squad-template__unit-cell-content--tier-8,
.squad-template__unit-cell-content--tier-9,
.squad-template__unit-cell-content--tier-10 {
 background-color:#e2d0e2
}
.squad-template__unit-cell-content--tier-2,
.squad-template__unit-cell-content--tier-3,
.squad-template__unit-cell-content--tier-4,
.squad-template__unit-cell-content--tier-5,
.squad-template__unit-cell-content--tier-6 {
 background-color:#d7ecff
}
.squad-template__unit-cell-data {
 margin-left:5px
}
.squad-template__unit-cell-data:first-child {
 margin-left:0
}
.squad-template__unit-cell-highlight {
 font-weight:700
}
.squad-template__unit-cell-link {
 color:inherit
}
.squad-template__unit-cell-link:active,
.squad-template__unit-cell-link:hover,
.squad-template__unit-cell-link:visited {
 text-decoration:none
}
.squad-template__unit-cell-zeta {
 width:25px;
 height:25px;
 margin:2px;
 border-radius:3px
}
.squad-template__data-item {
 display:flex
}
.squad-template__data-item-name {
 font-weight:700;
 flex:1
}
.squad-template__data-item-value {
 width:50px
}
.squad-template__data-zeta {
 display:flex;
 align-items:center;
 margin:3px 0
}
.squad-template__data-zeta-ability {
 font-weight:700;
 flex:1
}
.squad-template__data-zeta-image {
 padding:0 5px
}
.squad-template__data-zeta-img {
 width:25px;
 height:25px;
 border-radius:3px
}
.squad-template .sm-column-margin {
 margin:2px 0
}
.squad-template .patreon-signup-image {
 width:140px;
 height:30px
}
.squad-template .add-filter-button,
.squad-template .remove-filter-button {
 cursor:pointer
}
.squad-template .remover-filter-container {
 clear:both
}
.squad-template .sort-label {
 margin:10px
}
@media (min-width:768px) {
 .squad-template .sm-column-margin {
  margin:0
 }
 .squad-template .md-column-margin {
  margin:3px 0
 }
}
@media (min-width:1024px) {
 .squad-template .md-column-margin {
  margin:0
 }
}
.ability-icon {
 display:inline-flex;
 border:3px solid #333;
 background-color:#111;
 border-radius:4px;
 box-shadow:0 0 2px 3px #ccc
}
.ability-icon__img {
 width:80px;
 height:80px
}
.ability-icon--size-micro .ability-icon__img {
 width:24px;
 height:24px
}
.ability-icon--size-xsmall .ability-icon__img {
 width:32px;
 height:32px
}
.ability-icon--size-small .ability-icon__img {
 width:48px;
 height:48px
}
.ability-icon--size-medium .ability-icon__img {
 width:64px;
 height:64px
}
.ability-icon--size-large .ability-icon__img {
 width:100px;
 height:100px
}
.gear-icon2 {
 display:inline-block;
 vertical-align:middle;
 position:relative;
 width:64px;
 height:64px
}
.gear-icon2:before {
 content:"";
 display:block;
 background:url(https://swgoh.gg/static/img/ui/gear-atlas.png) no-repeat;
 position:absolute;
 top:0;
 left:0;
 right:0;
 bottom:0;
 z-index:2
}
.gear-icon2__inner {
 display:block;
 background:radial-gradient(#aaa,#000 80%);
 border-radius:13px 0 13px 7px;
 overflow:hidden
}
.gear-icon2__mk {
 position:absolute;
 right:2px;
 top:2px;
 color:#fff;
 z-index:10;
 font-size:8px;
 text-shadow:0 2px 2px #000;
 background-color:rgba(0,0,0,.3);
 padding:3px 3px 0;
 line-height:1
}
.gear-icon2__link {
 position:absolute;
 top:0;
 left:0;
 right:0;
 bottom:0;
 z-index:3
}
.gear-icon2 .gear-icon2__img {
 width:64px;
 height:64px
}
.gear-icon2.gear-icon2--tier-1:before {
 background-position:-64px -80px
}
.gear-icon2.gear-icon2--tier-2:before,
.gear-icon2.gear-icon2--tier-3:before {
 background-position:-128px -80px
}
.gear-icon2.gear-icon2--tier-4:before,
.gear-icon2.gear-icon2--tier-5:before,
.gear-icon2.gear-icon2--tier-6:before {
 background-position:-192px -80px
}
.gear-icon2.gear-icon2--tier-7:before,
.gear-icon2.gear-icon2--tier-8:before,
.gear-icon2.gear-icon2--tier-9:before,
.gear-icon2.gear-icon2--tier-10:before {
 background-position:-256px -80px
}
.gear-icon2.gear-icon2--tier-11:before {
 background-position:-320px -80px
}
.gear-icon2.gear-icon2--tier-12:before,
.gear-icon2.gear-icon2--tier-13:before {
 background-position:-384px -80px
}
.gear-icon2--size-micro,
.gear-icon2--size-micro .gear-icon2__img {
 width:32px;
 height:32px
}
.gear-icon2--size-micro.gear-icon2--tier-1:before {
 background-position:-32px -234px
}
.gear-icon2--size-micro.gear-icon2--tier-2:before,
.gear-icon2--size-micro.gear-icon2--tier-3:before {
 background-position:-64px -234px
}
.gear-icon2--size-micro.gear-icon2--tier-4:before,
.gear-icon2--size-micro.gear-icon2--tier-5:before,
.gear-icon2--size-micro.gear-icon2--tier-6:before {
 background-position:-96px -234px
}
.gear-icon2--size-micro.gear-icon2--tier-7:before,
.gear-icon2--size-micro.gear-icon2--tier-8:before,
.gear-icon2--size-micro.gear-icon2--tier-9:before,
.gear-icon2--size-micro.gear-icon2--tier-10:before {
 background-position:-128px -234px
}
.gear-icon2--size-micro.gear-icon2--tier-11:before {
 background-position:-160px -234px
}
.gear-icon2--size-micro.gear-icon2--tier-12:before,
.gear-icon2--size-micro.gear-icon2--tier-13:before {
 background-position:-192px -234px
}
.gear-icon2--size-small,
.gear-icon2--size-small .gear-icon2__img {
 width:40px;
 height:40px
}
.gear-icon2--size-small.gear-icon2--tier-1:before {
 background-position:-40px -194px
}
.gear-icon2--size-small.gear-icon2--tier-2:before,
.gear-icon2--size-small.gear-icon2--tier-3:before {
 background-position:-80px -194px
}
.gear-icon2--size-small.gear-icon2--tier-4:before,
.gear-icon2--size-small.gear-icon2--tier-5:before,
.gear-icon2--size-small.gear-icon2--tier-6:before {
 background-position:-120px -194px
}
.gear-icon2--size-small.gear-icon2--tier-7:before,
.gear-icon2--size-small.gear-icon2--tier-8:before,
.gear-icon2--size-small.gear-icon2--tier-9:before,
.gear-icon2--size-small.gear-icon2--tier-10:before {
 background-position:-160px -194px
}
.gear-icon2--size-small.gear-icon2--tier-11:before {
 background-position:-200px -194px
}
.gear-icon2--size-small.gear-icon2--tier-12:before,
.gear-icon2--size-small.gear-icon2--tier-13:before {
 background-position:-240px -194px
}
.gear-icon2--size-medium,
.gear-icon2--size-medium .gear-icon2__img {
 width:50px;
 height:50px
}
.gear-icon2--size-medium.gear-icon2--tier-1:before {
 background-position:-50px -144px
}
.gear-icon2--size-medium.gear-icon2--tier-2:before,
.gear-icon2--size-medium.gear-icon2--tier-3:before {
 background-position:-100px -144px
}
.gear-icon2--size-medium.gear-icon2--tier-4:before,
.gear-icon2--size-medium.gear-icon2--tier-5:before,
.gear-icon2--size-medium.gear-icon2--tier-6:before {
 background-position:-150px -144px
}
.gear-icon2--size-medium.gear-icon2--tier-7:before,
.gear-icon2--size-medium.gear-icon2--tier-8:before,
.gear-icon2--size-medium.gear-icon2--tier-9:before,
.gear-icon2--size-medium.gear-icon2--tier-10:before {
 background-position:-200px -144px
}
.gear-icon2--size-medium.gear-icon2--tier-11:before {
 background-position:-250px -144px
}
.gear-icon2--size-medium.gear-icon2--tier-12:before,
.gear-icon2--size-medium.gear-icon2--tier-13:before {
 background-position:-300px -144px
}
.gear-icon2--size-large,
.gear-icon2--size-large .gear-icon2__img {
 width:80px;
 height:80px
}
.gear-icon2--size-large.gear-icon2--tier-1:before {
 background-position:-80px 0
}
.gear-icon2--size-large.gear-icon2--tier-2:before,
.gear-icon2--size-large.gear-icon2--tier-3:before {
 background-position:-160px 0
}
.gear-icon2--size-large.gear-icon2--tier-4:before,
.gear-icon2--size-large.gear-icon2--tier-5:before,
.gear-icon2--size-large.gear-icon2--tier-6:before {
 background-position:-240px 0
}
.gear-icon2--size-large.gear-icon2--tier-7:before,
.gear-icon2--size-large.gear-icon2--tier-8:before,
.gear-icon2--size-large.gear-icon2--tier-9:before,
.gear-icon2--size-large.gear-icon2--tier-10:before {
 background-position:-320px 0
}
.gear-icon2--size-large.gear-icon2--tier-11:before {
 background-position:-400px 0
}
.gear-icon2--size-large.gear-icon2--tier-12:before,
.gear-icon2--size-large.gear-icon2--tier-13:before {
 background-position:-480px 0
}
.gear-icon2--size-large .gear-icon2__inner {
 border-radius:20px 2px 20px 14px
}
.gear-icon2--size-large .gear-icon2__mk {
 font-size:14px;
 font-weight:700;
 right:4px;
 top:4px
}
.gear-icon2--tier-1 .gear-icon2__inner {
 background:radial-gradient(#4391a3,#000 80%)
}
.gear-icon2--tier-2 .gear-icon2__inner,
.gear-icon2--tier-3 .gear-icon2__inner {
 background:radial-gradient(#4c9601,#000 80%)
}
.gear-icon2--tier-4 .gear-icon2__inner,
.gear-icon2--tier-5 .gear-icon2__inner,
.gear-icon2--tier-6 .gear-icon2__inner {
 background:radial-gradient(#004b65,#000 80%)
}
.gear-icon2--tier-7 .gear-icon2__inner,
.gear-icon2--tier-8 .gear-icon2__inner,
.gear-icon2--tier-9 .gear-icon2__inner,
.gear-icon2--tier-10 .gear-icon2__inner,
.gear-icon2--tier-11 .gear-icon2__inner {
 background:radial-gradient(#4700a7,#000 80%)
}
.gear-icon2--tier-12 .gear-icon2__inner {
 background:radial-gradient(#997300,#000 80%)
}
.gear-icon2--tier-13 .gear-icon2__inner {
 background:radial-gradient(#772c05,#000 80%)
}
.player-unit-ability-icon {
 position:relative
}
.player-unit-ability-icon__levels {
 display:flex;
 width:100%;
 margin-bottom:4px;
 position:relative;
 border-spacing:2px
}
.player-unit-ability-icon__pip {
 height:5px;
 border-radius:2px;
 background-color:#e2e1e1;
 border:1px solid #c7c4c4
}
.player-unit-ability-icon__pip--is-active {
 background-color:#32cd32;
 border-color:#00b100
}
.player-unit-ability-icon__pip--is-omega {
 background-color:gold;
 border-color:#e4c77d
}
.player-unit-ability-icon__pip--is-zeta {
 background-color:#742cbc;
 border-color:#020205
}
.player-unit-ability-icon__name {
 margin-top:5px;
 font-weight:700;
 text-align:center;
 font-size:11px
}
.player-unit-ability-icon__material {
 position:absolute;
 top:83px;
 right:-9px;
 background:#fff;
 border-radius:50%;
 border:3px solid #fff
}
.player-unit-ability-icon__material-img {
 opacity:.3;
 width:18px;
 display:block;
 -webkit-filter:grayscale(1);
 filter:grayscale(1)
}
.player-unit-ability-icon--is-maxed .player-unit-ability-icon__material-img {
 opacity:1;
 -webkit-filter:grayscale(0);
 filter:grayscale(0)
}
.character-portrait {
 display:inline-flex;
 vertical-align:middle;
 position:relative;
 width:80px;
 height:80px;
 border-radius:50%
}
.character-portrait__link {
 display:block
}
.character-portrait__image {
 display:inline-flex;
 vertical-align:top;
 position:relative;
 overflow:hidden;
 width:80px;
 height:80px;
 border-radius:50%;
 border:3px solid #333;
 background-color:#000;
 box-shadow:0 0 0 2px #555
}
.character-portrait__img {
 width:80px;
 height:80px;
 border-radius:50%;
 background-color:#000;
 position:absolute;
 top:50%;
 left:50%;
 -webkit-transform:translate(-50%,-50%);
 transform:translate(-50%,-50%)
}
.character-portrait__tier-overlay {
 position:absolute;
 width:80px;
 height:80px;
 z-index:2;
 top:0;
 left:0
}
.character-portrait__level {
 position:absolute;
 -webkit-transform:translate(-50%);
 transform:translate(-50%);
 color:#fff;
 font-weight:700;
 background-color:#264257;
 border:2px solid #fff;
 text-align:center;
 border-radius:100%/130% 130% 15px 15px;
 box-shadow:0 1px 2px rgba(0,0,0,.5);
 text-shadow:-1px -1px 0 #000,2px -1px 0 #000,2px 2px 0 #000,-1px 2px 0 #000,2px 3px 0 #000,1px 3px 0 #000,2px 3px 0 #000
}
.character-portrait__level--unit {
 bottom:-5px;
 left:50%;
 z-index:4;
 width:30px;
 padding:0 5px
}
.character-portrait__level--tier {
 left:80%;
 bottom:0;
 font-size:12px;
 min-width:26px;
 padding:0 6px 0 5px;
 z-index:2;
 box-shadow:0 1px 2px rgba(0,0,0,.5),inset 0 0 8px 1px rgba(0,0,0,.5)
}
.character-portrait__star {
 position:absolute;
 bottom:50%;
 left:50%;
 width:16px;
 height:58px;
 color:#000;
 -webkit-transform-origin:center bottom;
 transform-origin:center bottom;
 background:center 0 transparent url(https://swgoh.gg/static/img/star.png) no-repeat;
 background-size:100%
}
.character-portrait__star--is-inactive {
 background-image:url(https://swgoh.gg/static/img/star-inactive.png)
}
.character-portrait__star--pos-1 {
 -webkit-transform:translateX(-50%) rotate(-60deg);
 transform:translateX(-50%) rotate(-60deg)
}
.character-portrait__star--pos-2 {
 -webkit-transform:translateX(-50%) rotate(-40deg);
 transform:translateX(-50%) rotate(-40deg)
}
.character-portrait__star--pos-3 {
 -webkit-transform:translateX(-50%) rotate(-20deg);
 transform:translateX(-50%) rotate(-20deg)
}
.character-portrait__star--pos-4 {
 -webkit-transform:translateX(-50%) rotate(0deg);
 transform:translateX(-50%) rotate(0deg)
}
.character-portrait__star--pos-5 {
 -webkit-transform:translateX(-50%) rotate(20deg);
 transform:translateX(-50%) rotate(20deg)
}
.character-portrait__star--pos-6 {
 -webkit-transform:translateX(-50%) rotate(40deg);
 transform:translateX(-50%) rotate(40deg)
}
.character-portrait__star--pos-7 {
 -webkit-transform:translateX(-50%) rotate(60deg);
 transform:translateX(-50%) rotate(60deg)
}
.character-portrait--size-micro {
 border-width:2px;
 width:30px;
 height:30px
}
.character-portrait--size-micro .character-portrait__image,
.character-portrait--size-micro .character-portrait__img,
.character-portrait--size-micro .character-portrait__tier-overlay {
 width:30px;
 height:30px
}
.character-portrait--size-micro .character-portrait__level {
 font-size:8px;
 padding:0 3px;
 border-radius:100%/130% 130% 9px 9px;
 border-width:1px;
 width:auto
}
.character-portrait--size-micro .character-portrait__star {
 width:7px;
 height:24px
}
.character-portrait--size-xsmall {
 border-width:2px;
 width:40px;
 height:40px
}
.character-portrait--size-xsmall .character-portrait__image,
.character-portrait--size-xsmall .character-portrait__img,
.character-portrait--size-xsmall .character-portrait__tier-overlay {
 width:40px;
 height:40px
}
.character-portrait--size-xsmall .character-portrait__level {
 font-size:9px;
 width:20px;
 padding:0
}
.character-portrait--size-xsmall .character-portrait__star {
 width:8px;
 height:30px
}
.character-portrait--size-small {
 border-width:2px;
 width:50px;
 height:50px
}
.character-portrait--size-small .character-portrait__image,
.character-portrait--size-small .character-portrait__img,
.character-portrait--size-small .character-portrait__tier-overlay {
 width:50px;
 height:50px
}
.character-portrait--size-small .character-portrait__level {
 font-size:11px;
 width:25px;
 padding:0
}
.character-portrait--size-small .character-portrait__star {
 width:10px;
 height:37px
}
.character-portrait--size-medium,
.character-portrait--size-medium .character-portrait__image,
.character-portrait--size-medium .character-portrait__img,
.character-portrait--size-medium .character-portrait__tier-overlay {
 width:64px;
 height:64px
}
.character-portrait--size-medium .character-portrait__star {
 width:13px;
 height:47px
}
.character-portrait--size-large,
.character-portrait--size-large .character-portrait__image,
.character-portrait--size-large .character-portrait__img,
.character-portrait--size-large .character-portrait__tier-overlay {
 width:100px;
 height:100px
}
.character-portrait--size-large .character-portrait__star {
 width:19px;
 height:71px
}
.character-portrait--size-large .character-portrait__level--unit {
 font-size:16px;
 width:35px
}
.character-portrait--size-large .character-portrait__level--tier {
 font-size:14px;
 width:30px;
 left:78%
}
.character-portrait--alignment-dark-side .character-portrait__image {
 border-color:#b03233;
 box-shadow:inset 0 0 3px 2px rgba(176,50,51,.8)
}
.character-portrait--alignment-light-side .character-portrait__image {
 border-color:#3f8cba;
 box-shadow:inset 0 0 3px 2px rgba(63,140,186,.8)
}
.character-portrait--tier-1 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g1.svg)
}
.character-portrait--tier-2 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g2.svg)
}
.character-portrait--tier-3 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g3.svg)
}
.character-portrait--tier-4 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g4.svg)
}
.character-portrait--tier-5 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g5.svg)
}
.character-portrait--tier-6 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g6.svg)
}
.character-portrait--tier-7 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g7.svg)
}
.character-portrait--tier-8 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g8.svg)
}
.character-portrait--tier-9 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g9.svg)
}
.character-portrait--tier-10 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g10.svg)
}
.character-portrait--tier-11 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g11.svg)
}
.character-portrait--tier-12 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g12.svg)
}
.character-portrait--tier-13 .character-portrait__tier-overlay {
 background-image:url(https://swgoh.gg/static/img/ui/gear-icon-g13.svg)
}
.character-portrait--tier-1 .character-portrait__level--tier {
 background-color:#a5d0da
}
.character-portrait--tier-2 .character-portrait__level--tier,
.character-portrait--tier-3 .character-portrait__level--tier {
 background-color:#98fd33
}
.character-portrait--tier-4 .character-portrait__level--tier,
.character-portrait--tier-5 .character-portrait__level--tier,
.character-portrait--tier-6 .character-portrait__level--tier {
 background-color:#00bdfe
}
.character-portrait--tier-7 .character-portrait__level--tier,
.character-portrait--tier-8 .character-portrait__level--tier,
.character-portrait--tier-9 .character-portrait__level--tier,
.character-portrait--tier-10 .character-portrait__level--tier,
.character-portrait--tier-11 .character-portrait__level--tier {
 background-color:#9241ff
}
.character-portrait--tier-12 .character-portrait__level--tier {
 background-color:#fc3
}
.character-portrait--tier-13 .character-portrait__level--tier {
 background-color:#f56820
}
.ship-portrait {
 width:126px
}
.ship-portrait__preview {
 position:relative
}
.ship-portrait__frame {
 display:block;
 background-image:url(https://swgoh.gg/static/img/ui/ship-frame.svg);
 background-repeat:no-repeat;
 background-size:cover;
 position:absolute;
 top:-1px;
 left:-1px;
 right:-1px;
 bottom:-1px;
 z-index:2
}
.ship-portrait__image {
 position:relative;
 overflow:hidden;
 height:76px;
 background-color:#000
}
.ship-portrait__img {
 position:absolute;
 left:50%;
 top:50%;
 -webkit-transform:translate(-50%,-50%);
 transform:translate(-50%,-50%);
 width:100%
}
.ship-portrait__stars {
 display:flex;
 justify-content:space-around;
 margin-bottom:3px
}
.ship-portrait__star {
 width:18px;
 height:18px;
 color:#000;
 background:center 0 transparent url(https://swgoh.gg/static/img/star.png) no-repeat;
 background-size:100%
}
.ship-portrait__star--is-inactive {
 background-image:url(https://swgoh.gg/static/img/star-inactive.png)
}
.ship-portrait__level {
 position:absolute;
 z-index:3;
 bottom:0;
 right:0;
 padding:2px;
 line-height:1;
 color:#fff;
 font-weight:700;
 text-align:center;
 min-width:19px;
 text-shadow:-1px -1px 0 #000,2px -1px 0 #000,2px 2px 0 #000,-1px 2px 0 #000,2px 3px 0 #000,1px 3px 0 #000,2px 3px 0 #000
}
.ship-portrait--is-capital .ship-portrait__frame {
 background-image:url(https://swgoh.gg/static/img/ui/capital-ship-frame.svg);
 top:-3px;
 left:-5px;
 right:-5px;
 bottom:-5px
}
.ship-portrait--size-micro {
 width:40px
}
.ship-portrait--size-micro .ship-portrait__image {
 height:24px
}
.ship-portrait--size-micro .ship-portrait__frame {
 top:-1px;
 left:-1px;
 right:-1px;
 bottom:-1px
}
.ship-portrait--size-micro .ship-portrait__star {
 width:5px;
 height:5px
}
.ship-portrait--size-micro .ship-portrait__level {
 font-size:9px;
 min-width:13px;
 padding:0
}
.ship-portrait--size-xsmall {
 width:53px
}
.ship-portrait--size-xsmall .ship-portrait__image {
 height:32px
}
.ship-portrait--size-xsmall .ship-portrait__frame {
 top:-1px;
 left:-1px;
 right:-1px;
 bottom:-1px
}
.ship-portrait--size-xsmall .ship-portrait__star {
 width:8px;
 height:8px
}
.ship-portrait--size-xsmall .ship-portrait__level {
 font-size:9px;
 min-width:10px;
 padding:0
}
.ship-portrait--size-small {
 width:80px
}
.ship-portrait--size-small .ship-portrait__image {
 height:48px
}
.ship-portrait--size-small .ship-portrait__frame {
 top:-2px;
 left:-2px;
 right:-2px;
 bottom:-2px
}
.ship-portrait--size-small .ship-portrait__star {
 width:11px;
 height:11px
}
.ship-portrait--size-small .ship-portrait__level {
 font-size:10px;
 min-width:10px;
 padding:0
}
.ship-portrait--size-medium {
 width:106px
}
.ship-portrait--size-medium .ship-portrait__image {
 height:64px
}
.ship-portrait--size-medium .ship-portrait__frame {
 top:-2px;
 left:-2px;
 right:-2px;
 bottom:-2px
}
.ship-portrait--size-medium .ship-portrait__star {
 width:15px;
 height:15px
}
.ship-portrait--size-large {
 width:140px
}
.ship-portrait--size-large .ship-portrait__image {
 height:86px
}
.ship-portrait--size-large .ship-portrait__frame {
 top:-2px;
 left:-2px;
 right:-2px;
 bottom:-2px
}
.ship-portrait--size-large .ship-portrait__star {
 width:18px;
 height:18px
}
.ship-portrait--size-large.ship-portrait--is-capital .ship-portrait__frame {
 top:-2px;
 left:-4px;
 right:-2px;
 bottom:-3px
}
.ship-portrait .simple-tooltip {
 display:block
}
.stat-mod-icon {
 position:relative;
 display:inline-block
}
.stat-mod-icon-pips {
 display:flex;
 background-color:#181615;
 margin:0 auto 4px;
 width:68px;
 padding:2px 3px;
 line-height:0;
 border-radius:4px;
 box-shadow:0 0 0 1px #aaa;
 height:10px
}
.stat-mod-icon-pips__pip {
 width:6px;
 background-color:#fefce7;
 border-radius:50%;
 margin-right:3px
}
.stat-mod-icon-pips__pip:first-child {
 margin-left:1px
}
.stat-mod-icon-pips__pip:last-child {
 margin-right:1px
}
.stat-mod-icon-pips--size-xsmall {
 margin-bottom:0;
 width:31px;
 padding:1px;
 border-radius:3px;
 height:6px
}
.stat-mod-icon-pips--size-xsmall .stat-mod-icon-pips__pip {
 width:3px;
 margin-right:1px
}
.stat-mod-icon-pips--size-small {
 margin-bottom:1px;
 width:38px;
 padding:1px;
 border-radius:3px;
 height:6px
}
.stat-mod-icon-pips--size-small .stat-mod-icon-pips__pip {
 width:3px;
 margin-right:2px
}
.stat-mod-icon-pips--size-medium {
 margin-bottom:2px;
 width:52px;
 padding:2px;
 border-radius:3px;
 height:9px
}
.stat-mod-icon-pips--size-medium .stat-mod-icon-pips__pip {
 width:5px;
 margin-right:2px
}
.stat-mod-icon-pips--size-large {
 width:74px
}
.stat-mod-icon-pips--size-large .stat-mod-icon-pips__pip {
 margin-right:4px
}
.stat-mod-icon-shape {
 position:relative
}
.stat-mod-icon-shape__icon {
 width:32px;
 height:32px;
 background:0 0 transparent url(https://swgoh.gg/static/img/ui/mod-icon-atlas.png) no-repeat;
 position:absolute
}
.stat-mod-icon-shape__shape {
 width:90px;
 height:90px;
 background:0 0 transparent url(https://swgoh.gg/static/img/ui/mod-shape-atlas.png) no-repeat
}
.stat-mod-icon-shape--slot-1 .stat-mod-icon-shape__icon {
 left:41%;
 top:24%
}
.stat-mod-icon-shape--slot-2 .stat-mod-icon-shape__icon {
 left:44%;
 top:19%;
 -webkit-transform:scale(.8);
 transform:scale(.8)
}
.stat-mod-icon-shape--slot-3 .stat-mod-icon-shape__icon {
 left:32%;
 top:32%;
 -webkit-transform:scale(.9);
 transform:scale(.9)
}
.stat-mod-icon-shape--slot-4 .stat-mod-icon-shape__icon {
 left:32%;
 top:40%;
 -webkit-transform:scale(.7);
 transform:scale(.7)
}
.stat-mod-icon-shape--slot-5 .stat-mod-icon-shape__icon {
 left:33%;
 top:33%;
 -webkit-transform:scale(.8);
 transform:scale(.8)
}
.stat-mod-icon-shape--slot-6 .stat-mod-icon-shape__icon {
 left:32%;
 top:34%;
 -webkit-transform:scale(.85);
 transform:scale(.85)
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-1-2 {
 background-position:0 -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-1-3 {
 background-position:0 -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-1-4 {
 background-position:0 -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-1-5 {
 background-position:0 -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-2-1 {
 background-position:-78px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-2-2 {
 background-position:-78px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-2-3 {
 background-position:-78px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-2-4 {
 background-position:-78px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-2-5 {
 background-position:-78px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-3-1 {
 background-position:-156px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-3-2 {
 background-position:-156px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-3-3 {
 background-position:-156px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-3-4 {
 background-position:-156px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-3-5 {
 background-position:-156px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-4-1 {
 background-position:-234px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-4-2 {
 background-position:-234px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-4-3 {
 background-position:-234px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-4-4 {
 background-position:-234px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-4-5 {
 background-position:-234px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-5-1 {
 background-position:-312px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-5-2 {
 background-position:-312px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-5-3 {
 background-position:-312px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-5-4 {
 background-position:-312px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-5-5 {
 background-position:-312px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-6-1 {
 background-position:-390px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-6-2 {
 background-position:-390px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-6-3 {
 background-position:-390px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-6-4 {
 background-position:-390px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-1-6-5 {
 background-position:-390px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-1-2 {
 background-position:0 -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-1-3 {
 background-position:0 -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-1-4 {
 background-position:0 -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-1-5 {
 background-position:0 -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-2-1 {
 background-position:-78px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-2-2 {
 background-position:-78px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-2-3 {
 background-position:-78px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-2-4 {
 background-position:-78px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-2-5 {
 background-position:-78px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-3-1 {
 background-position:-156px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-3-2 {
 background-position:-156px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-3-3 {
 background-position:-156px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-3-4 {
 background-position:-156px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-3-5 {
 background-position:-156px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-4-1 {
 background-position:-234px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-4-2 {
 background-position:-234px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-4-3 {
 background-position:-234px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-4-4 {
 background-position:-234px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-4-5 {
 background-position:-234px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-5-1 {
 background-position:-312px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-5-2 {
 background-position:-312px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-5-3 {
 background-position:-312px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-5-4 {
 background-position:-312px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-5-5 {
 background-position:-312px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-6-1 {
 background-position:-390px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-6-2 {
 background-position:-390px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-6-3 {
 background-position:-390px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-6-4 {
 background-position:-390px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-2-6-5 {
 background-position:-390px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-1-2 {
 background-position:0 -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-1-3 {
 background-position:0 -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-1-4 {
 background-position:0 -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-1-5 {
 background-position:0 -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-2-1 {
 background-position:-78px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-2-2 {
 background-position:-78px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-2-3 {
 background-position:-78px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-2-4 {
 background-position:-78px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-2-5 {
 background-position:-78px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-3-1 {
 background-position:-156px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-3-2 {
 background-position:-156px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-3-3 {
 background-position:-156px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-3-4 {
 background-position:-156px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-3-5 {
 background-position:-156px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-4-1 {
 background-position:-234px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-4-2 {
 background-position:-234px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-4-3 {
 background-position:-234px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-4-4 {
 background-position:-234px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-4-5 {
 background-position:-234px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-5-1 {
 background-position:-312px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-5-2 {
 background-position:-312px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-5-3 {
 background-position:-312px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-5-4 {
 background-position:-312px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-5-5 {
 background-position:-312px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-6-1 {
 background-position:-390px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-6-2 {
 background-position:-390px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-6-3 {
 background-position:-390px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-6-4 {
 background-position:-390px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-3-6-5 {
 background-position:-390px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-1-2 {
 background-position:0 -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-1-3 {
 background-position:0 -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-1-4 {
 background-position:0 -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-1-5 {
 background-position:0 -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-2-1 {
 background-position:-78px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-2-2 {
 background-position:-78px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-2-3 {
 background-position:-78px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-2-4 {
 background-position:-78px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-2-5 {
 background-position:-78px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-3-1 {
 background-position:-156px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-3-2 {
 background-position:-156px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-3-3 {
 background-position:-156px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-3-4 {
 background-position:-156px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-3-5 {
 background-position:-156px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-4-1 {
 background-position:-234px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-4-2 {
 background-position:-234px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-4-3 {
 background-position:-234px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-4-4 {
 background-position:-234px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-4-5 {
 background-position:-234px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-5-1 {
 background-position:-312px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-5-2 {
 background-position:-312px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-5-3 {
 background-position:-312px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-5-4 {
 background-position:-312px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-5-5 {
 background-position:-312px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-6-1 {
 background-position:-390px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-6-2 {
 background-position:-390px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-6-3 {
 background-position:-390px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-6-4 {
 background-position:-390px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-4-6-5 {
 background-position:-390px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-1-2 {
 background-position:0 -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-1-3 {
 background-position:0 -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-1-4 {
 background-position:0 -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-1-5 {
 background-position:0 -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-2-1 {
 background-position:-78px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-2-2 {
 background-position:-78px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-2-3 {
 background-position:-78px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-2-4 {
 background-position:-78px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-2-5 {
 background-position:-78px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-3-1 {
 background-position:-156px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-3-2 {
 background-position:-156px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-3-3 {
 background-position:-156px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-3-4 {
 background-position:-156px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-3-5 {
 background-position:-156px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-4-1 {
 background-position:-234px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-4-2 {
 background-position:-234px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-4-3 {
 background-position:-234px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-4-4 {
 background-position:-234px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-4-5 {
 background-position:-234px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-5-1 {
 background-position:-312px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-5-2 {
 background-position:-312px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-5-3 {
 background-position:-312px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-5-4 {
 background-position:-312px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-5-5 {
 background-position:-312px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-6-1 {
 background-position:-390px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-6-2 {
 background-position:-390px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-6-3 {
 background-position:-390px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-6-4 {
 background-position:-390px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-5-6-5 {
 background-position:-390px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-1-1 {
 background-position:-468px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-1-2 {
 background-position:-468px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-1-3 {
 background-position:-468px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-1-4 {
 background-position:-468px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-1-5 {
 background-position:-468px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-2-1 {
 background-position:-546px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-2-2 {
 background-position:-546px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-2-3 {
 background-position:-546px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-2-4 {
 background-position:-546px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-2-5 {
 background-position:-546px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-3-1 {
 background-position:-624px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-3-2 {
 background-position:-624px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-3-3 {
 background-position:-624px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-3-4 {
 background-position:-624px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-3-5 {
 background-position:-624px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-4-1 {
 background-position:-702px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-4-2 {
 background-position:-702px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-4-3 {
 background-position:-702px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-4-4 {
 background-position:-702px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-4-5 {
 background-position:-702px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-5-1 {
 background-position:-780px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-5-2 {
 background-position:-780px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-5-3 {
 background-position:-780px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-5-4 {
 background-position:-780px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-5-5 {
 background-position:-780px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-6-1 {
 background-position:-858px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-6-2 {
 background-position:-858px -78px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-6-3 {
 background-position:-858px -156px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-6-4 {
 background-position:-858px -234px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape--key-6-6-5 {
 background-position:-858px -312px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-1-2 {
 background-position:0 -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-1-3 {
 background-position:0 -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-1-4 {
 background-position:0 -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-1-5 {
 background-position:0 -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-2-1 {
 background-position:-27px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-2-2 {
 background-position:-27px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-2-3 {
 background-position:-27px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-2-4 {
 background-position:-27px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-2-5 {
 background-position:-27px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-3-1 {
 background-position:-54px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-3-2 {
 background-position:-54px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-3-3 {
 background-position:-54px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-3-4 {
 background-position:-54px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-3-5 {
 background-position:-54px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-4-1 {
 background-position:-81px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-4-2 {
 background-position:-81px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-4-3 {
 background-position:-81px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-4-4 {
 background-position:-81px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-4-5 {
 background-position:-81px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-5-1 {
 background-position:-108px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-5-2 {
 background-position:-108px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-5-3 {
 background-position:-108px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-5-4 {
 background-position:-108px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-5-5 {
 background-position:-108px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-6-1 {
 background-position:-135px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-6-2 {
 background-position:-135px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-6-3 {
 background-position:-135px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-6-4 {
 background-position:-135px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-6-5 {
 background-position:-135px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-7-1 {
 background-position:-162px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-7-2 {
 background-position:-162px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-7-3 {
 background-position:-162px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-7-4 {
 background-position:-162px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-7-5 {
 background-position:-162px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-8-1 {
 background-position:-189px 0
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-8-2 {
 background-position:-189px -27px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-8-3 {
 background-position:-189px -54px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-8-4 {
 background-position:-189px -81px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon--key-8-5 {
 background-position:-189px -108px
}
.stat-mod-icon-shape .stat-mod-icon-shape__icon {
 width:27px;
 height:27px;
 background-size:216px 135px
}
.stat-mod-icon-shape .stat-mod-icon-shape__shape {
 width:78px;
 height:78px;
 background-size:936px 390px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-1-2 {
 background-position:0 -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-1-3 {
 background-position:0 -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-1-4 {
 background-position:0 -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-1-5 {
 background-position:0 -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-2-1 {
 background-position:-35px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-2-2 {
 background-position:-35px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-2-3 {
 background-position:-35px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-2-4 {
 background-position:-35px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-2-5 {
 background-position:-35px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-3-1 {
 background-position:-70px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-3-2 {
 background-position:-70px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-3-3 {
 background-position:-70px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-3-4 {
 background-position:-70px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-3-5 {
 background-position:-70px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-4-1 {
 background-position:-105px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-4-2 {
 background-position:-105px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-4-3 {
 background-position:-105px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-4-4 {
 background-position:-105px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-4-5 {
 background-position:-105px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-5-1 {
 background-position:-140px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-5-2 {
 background-position:-140px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-5-3 {
 background-position:-140px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-5-4 {
 background-position:-140px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-5-5 {
 background-position:-140px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-6-1 {
 background-position:-175px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-6-2 {
 background-position:-175px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-6-3 {
 background-position:-175px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-6-4 {
 background-position:-175px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-1-6-5 {
 background-position:-175px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-1-2 {
 background-position:0 -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-1-3 {
 background-position:0 -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-1-4 {
 background-position:0 -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-1-5 {
 background-position:0 -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-2-1 {
 background-position:-35px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-2-2 {
 background-position:-35px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-2-3 {
 background-position:-35px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-2-4 {
 background-position:-35px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-2-5 {
 background-position:-35px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-3-1 {
 background-position:-70px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-3-2 {
 background-position:-70px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-3-3 {
 background-position:-70px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-3-4 {
 background-position:-70px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-3-5 {
 background-position:-70px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-4-1 {
 background-position:-105px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-4-2 {
 background-position:-105px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-4-3 {
 background-position:-105px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-4-4 {
 background-position:-105px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-4-5 {
 background-position:-105px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-5-1 {
 background-position:-140px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-5-2 {
 background-position:-140px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-5-3 {
 background-position:-140px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-5-4 {
 background-position:-140px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-5-5 {
 background-position:-140px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-6-1 {
 background-position:-175px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-6-2 {
 background-position:-175px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-6-3 {
 background-position:-175px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-6-4 {
 background-position:-175px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-2-6-5 {
 background-position:-175px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-1-2 {
 background-position:0 -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-1-3 {
 background-position:0 -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-1-4 {
 background-position:0 -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-1-5 {
 background-position:0 -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-2-1 {
 background-position:-35px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-2-2 {
 background-position:-35px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-2-3 {
 background-position:-35px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-2-4 {
 background-position:-35px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-2-5 {
 background-position:-35px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-3-1 {
 background-position:-70px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-3-2 {
 background-position:-70px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-3-3 {
 background-position:-70px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-3-4 {
 background-position:-70px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-3-5 {
 background-position:-70px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-4-1 {
 background-position:-105px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-4-2 {
 background-position:-105px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-4-3 {
 background-position:-105px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-4-4 {
 background-position:-105px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-4-5 {
 background-position:-105px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-5-1 {
 background-position:-140px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-5-2 {
 background-position:-140px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-5-3 {
 background-position:-140px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-5-4 {
 background-position:-140px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-5-5 {
 background-position:-140px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-6-1 {
 background-position:-175px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-6-2 {
 background-position:-175px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-6-3 {
 background-position:-175px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-6-4 {
 background-position:-175px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-3-6-5 {
 background-position:-175px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-1-2 {
 background-position:0 -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-1-3 {
 background-position:0 -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-1-4 {
 background-position:0 -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-1-5 {
 background-position:0 -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-2-1 {
 background-position:-35px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-2-2 {
 background-position:-35px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-2-3 {
 background-position:-35px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-2-4 {
 background-position:-35px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-2-5 {
 background-position:-35px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-3-1 {
 background-position:-70px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-3-2 {
 background-position:-70px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-3-3 {
 background-position:-70px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-3-4 {
 background-position:-70px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-3-5 {
 background-position:-70px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-4-1 {
 background-position:-105px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-4-2 {
 background-position:-105px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-4-3 {
 background-position:-105px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-4-4 {
 background-position:-105px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-4-5 {
 background-position:-105px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-5-1 {
 background-position:-140px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-5-2 {
 background-position:-140px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-5-3 {
 background-position:-140px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-5-4 {
 background-position:-140px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-5-5 {
 background-position:-140px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-6-1 {
 background-position:-175px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-6-2 {
 background-position:-175px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-6-3 {
 background-position:-175px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-6-4 {
 background-position:-175px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-4-6-5 {
 background-position:-175px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-1-2 {
 background-position:0 -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-1-3 {
 background-position:0 -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-1-4 {
 background-position:0 -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-1-5 {
 background-position:0 -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-2-1 {
 background-position:-35px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-2-2 {
 background-position:-35px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-2-3 {
 background-position:-35px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-2-4 {
 background-position:-35px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-2-5 {
 background-position:-35px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-3-1 {
 background-position:-70px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-3-2 {
 background-position:-70px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-3-3 {
 background-position:-70px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-3-4 {
 background-position:-70px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-3-5 {
 background-position:-70px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-4-1 {
 background-position:-105px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-4-2 {
 background-position:-105px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-4-3 {
 background-position:-105px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-4-4 {
 background-position:-105px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-4-5 {
 background-position:-105px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-5-1 {
 background-position:-140px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-5-2 {
 background-position:-140px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-5-3 {
 background-position:-140px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-5-4 {
 background-position:-140px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-5-5 {
 background-position:-140px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-6-1 {
 background-position:-175px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-6-2 {
 background-position:-175px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-6-3 {
 background-position:-175px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-6-4 {
 background-position:-175px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-5-6-5 {
 background-position:-175px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-1-1 {
 background-position:-210px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-1-2 {
 background-position:-210px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-1-3 {
 background-position:-210px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-1-4 {
 background-position:-210px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-1-5 {
 background-position:-210px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-2-1 {
 background-position:-245px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-2-2 {
 background-position:-245px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-2-3 {
 background-position:-245px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-2-4 {
 background-position:-245px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-2-5 {
 background-position:-245px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-3-1 {
 background-position:-280px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-3-2 {
 background-position:-280px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-3-3 {
 background-position:-280px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-3-4 {
 background-position:-280px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-3-5 {
 background-position:-280px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-4-1 {
 background-position:-315px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-4-2 {
 background-position:-315px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-4-3 {
 background-position:-315px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-4-4 {
 background-position:-315px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-4-5 {
 background-position:-315px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-5-1 {
 background-position:-350px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-5-2 {
 background-position:-350px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-5-3 {
 background-position:-350px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-5-4 {
 background-position:-350px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-5-5 {
 background-position:-350px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-6-1 {
 background-position:-385px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-6-2 {
 background-position:-385px -35px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-6-3 {
 background-position:-385px -70px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-6-4 {
 background-position:-385px -105px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape--key-6-6-5 {
 background-position:-385px -140px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-1-2 {
 background-position:0 -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-1-3 {
 background-position:0 -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-1-4 {
 background-position:0 -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-1-5 {
 background-position:0 -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-2-1 {
 background-position:-12.4px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-2-2 {
 background-position:-12.4px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-2-3 {
 background-position:-12.4px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-2-4 {
 background-position:-12.4px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-2-5 {
 background-position:-12.4px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-3-1 {
 background-position:-24.8px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-3-2 {
 background-position:-24.8px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-3-3 {
 background-position:-24.8px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-3-4 {
 background-position:-24.8px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-3-5 {
 background-position:-24.8px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-4-1 {
 background-position:-37.2px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-4-2 {
 background-position:-37.2px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-4-3 {
 background-position:-37.2px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-4-4 {
 background-position:-37.2px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-4-5 {
 background-position:-37.2px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-5-1 {
 background-position:-49.6px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-5-2 {
 background-position:-49.6px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-5-3 {
 background-position:-49.6px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-5-4 {
 background-position:-49.6px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-5-5 {
 background-position:-49.6px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-6-1 {
 background-position:-62px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-6-2 {
 background-position:-62px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-6-3 {
 background-position:-62px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-6-4 {
 background-position:-62px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-6-5 {
 background-position:-62px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-7-1 {
 background-position:-74.4px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-7-2 {
 background-position:-74.4px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-7-3 {
 background-position:-74.4px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-7-4 {
 background-position:-74.4px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-7-5 {
 background-position:-74.4px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-8-1 {
 background-position:-86.8px 0
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-8-2 {
 background-position:-86.8px -12.4px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-8-3 {
 background-position:-86.8px -24.8px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-8-4 {
 background-position:-86.8px -37.2px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon--key-8-5 {
 background-position:-86.8px -49.6px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__icon {
 width:12.4px;
 height:12.4px;
 background-size:99.2px 62px
}
.stat-mod-icon-shape--size-xsmall .stat-mod-icon-shape__shape {
 width:35px;
 height:35px;
 background-size:420px 175px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-1-2 {
 background-position:0 -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-1-3 {
 background-position:0 -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-1-4 {
 background-position:0 -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-1-5 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-2-1 {
 background-position:-48px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-2-2 {
 background-position:-48px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-2-3 {
 background-position:-48px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-2-4 {
 background-position:-48px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-2-5 {
 background-position:-48px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-3-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-3-2 {
 background-position:-96px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-3-3 {
 background-position:-96px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-3-4 {
 background-position:-96px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-3-5 {
 background-position:-96px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-4-1 {
 background-position:-144px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-4-2 {
 background-position:-144px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-4-3 {
 background-position:-144px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-4-4 {
 background-position:-144px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-4-5 {
 background-position:-144px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-5-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-5-2 {
 background-position:-192px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-5-3 {
 background-position:-192px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-5-4 {
 background-position:-192px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-5-5 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-6-1 {
 background-position:-240px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-6-2 {
 background-position:-240px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-6-3 {
 background-position:-240px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-6-4 {
 background-position:-240px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-1-6-5 {
 background-position:-240px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-1-2 {
 background-position:0 -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-1-3 {
 background-position:0 -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-1-4 {
 background-position:0 -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-1-5 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-2-1 {
 background-position:-48px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-2-2 {
 background-position:-48px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-2-3 {
 background-position:-48px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-2-4 {
 background-position:-48px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-2-5 {
 background-position:-48px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-3-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-3-2 {
 background-position:-96px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-3-3 {
 background-position:-96px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-3-4 {
 background-position:-96px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-3-5 {
 background-position:-96px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-4-1 {
 background-position:-144px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-4-2 {
 background-position:-144px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-4-3 {
 background-position:-144px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-4-4 {
 background-position:-144px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-4-5 {
 background-position:-144px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-5-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-5-2 {
 background-position:-192px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-5-3 {
 background-position:-192px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-5-4 {
 background-position:-192px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-5-5 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-6-1 {
 background-position:-240px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-6-2 {
 background-position:-240px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-6-3 {
 background-position:-240px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-6-4 {
 background-position:-240px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-2-6-5 {
 background-position:-240px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-1-2 {
 background-position:0 -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-1-3 {
 background-position:0 -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-1-4 {
 background-position:0 -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-1-5 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-2-1 {
 background-position:-48px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-2-2 {
 background-position:-48px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-2-3 {
 background-position:-48px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-2-4 {
 background-position:-48px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-2-5 {
 background-position:-48px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-3-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-3-2 {
 background-position:-96px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-3-3 {
 background-position:-96px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-3-4 {
 background-position:-96px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-3-5 {
 background-position:-96px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-4-1 {
 background-position:-144px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-4-2 {
 background-position:-144px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-4-3 {
 background-position:-144px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-4-4 {
 background-position:-144px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-4-5 {
 background-position:-144px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-5-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-5-2 {
 background-position:-192px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-5-3 {
 background-position:-192px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-5-4 {
 background-position:-192px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-5-5 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-6-1 {
 background-position:-240px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-6-2 {
 background-position:-240px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-6-3 {
 background-position:-240px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-6-4 {
 background-position:-240px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-3-6-5 {
 background-position:-240px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-1-2 {
 background-position:0 -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-1-3 {
 background-position:0 -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-1-4 {
 background-position:0 -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-1-5 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-2-1 {
 background-position:-48px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-2-2 {
 background-position:-48px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-2-3 {
 background-position:-48px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-2-4 {
 background-position:-48px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-2-5 {
 background-position:-48px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-3-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-3-2 {
 background-position:-96px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-3-3 {
 background-position:-96px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-3-4 {
 background-position:-96px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-3-5 {
 background-position:-96px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-4-1 {
 background-position:-144px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-4-2 {
 background-position:-144px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-4-3 {
 background-position:-144px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-4-4 {
 background-position:-144px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-4-5 {
 background-position:-144px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-5-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-5-2 {
 background-position:-192px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-5-3 {
 background-position:-192px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-5-4 {
 background-position:-192px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-5-5 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-6-1 {
 background-position:-240px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-6-2 {
 background-position:-240px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-6-3 {
 background-position:-240px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-6-4 {
 background-position:-240px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-4-6-5 {
 background-position:-240px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-1-2 {
 background-position:0 -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-1-3 {
 background-position:0 -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-1-4 {
 background-position:0 -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-1-5 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-2-1 {
 background-position:-48px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-2-2 {
 background-position:-48px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-2-3 {
 background-position:-48px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-2-4 {
 background-position:-48px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-2-5 {
 background-position:-48px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-3-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-3-2 {
 background-position:-96px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-3-3 {
 background-position:-96px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-3-4 {
 background-position:-96px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-3-5 {
 background-position:-96px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-4-1 {
 background-position:-144px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-4-2 {
 background-position:-144px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-4-3 {
 background-position:-144px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-4-4 {
 background-position:-144px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-4-5 {
 background-position:-144px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-5-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-5-2 {
 background-position:-192px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-5-3 {
 background-position:-192px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-5-4 {
 background-position:-192px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-5-5 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-6-1 {
 background-position:-240px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-6-2 {
 background-position:-240px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-6-3 {
 background-position:-240px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-6-4 {
 background-position:-240px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-5-6-5 {
 background-position:-240px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-1-1 {
 background-position:-288px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-1-2 {
 background-position:-288px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-1-3 {
 background-position:-288px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-1-4 {
 background-position:-288px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-1-5 {
 background-position:-288px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-2-1 {
 background-position:-336px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-2-2 {
 background-position:-336px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-2-3 {
 background-position:-336px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-2-4 {
 background-position:-336px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-2-5 {
 background-position:-336px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-3-1 {
 background-position:-384px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-3-2 {
 background-position:-384px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-3-3 {
 background-position:-384px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-3-4 {
 background-position:-384px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-3-5 {
 background-position:-384px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-4-1 {
 background-position:-432px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-4-2 {
 background-position:-432px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-4-3 {
 background-position:-432px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-4-4 {
 background-position:-432px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-4-5 {
 background-position:-432px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-5-1 {
 background-position:-480px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-5-2 {
 background-position:-480px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-5-3 {
 background-position:-480px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-5-4 {
 background-position:-480px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-5-5 {
 background-position:-480px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-6-1 {
 background-position:-528px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-6-2 {
 background-position:-528px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-6-3 {
 background-position:-528px -96px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-6-4 {
 background-position:-528px -144px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape--key-6-6-5 {
 background-position:-528px -192px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-1-2 {
 background-position:0 -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-1-3 {
 background-position:0 -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-1-4 {
 background-position:0 -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-1-5 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-2-1 {
 background-position:-16px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-2-2 {
 background-position:-16px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-2-3 {
 background-position:-16px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-2-4 {
 background-position:-16px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-2-5 {
 background-position:-16px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-3-1 {
 background-position:-32px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-3-2 {
 background-position:-32px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-3-3 {
 background-position:-32px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-3-4 {
 background-position:-32px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-3-5 {
 background-position:-32px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-4-1 {
 background-position:-48px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-4-2 {
 background-position:-48px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-4-3 {
 background-position:-48px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-4-4 {
 background-position:-48px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-4-5 {
 background-position:-48px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-5-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-5-2 {
 background-position:-64px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-5-3 {
 background-position:-64px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-5-4 {
 background-position:-64px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-5-5 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-6-1 {
 background-position:-80px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-6-2 {
 background-position:-80px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-6-3 {
 background-position:-80px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-6-4 {
 background-position:-80px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-6-5 {
 background-position:-80px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-7-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-7-2 {
 background-position:-96px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-7-3 {
 background-position:-96px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-7-4 {
 background-position:-96px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-7-5 {
 background-position:-96px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-8-1 {
 background-position:-112px 0
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-8-2 {
 background-position:-112px -16px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-8-3 {
 background-position:-112px -32px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-8-4 {
 background-position:-112px -48px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon--key-8-5 {
 background-position:-112px -64px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__icon {
 width:16px;
 height:16px;
 background-size:128px 80px
}
.stat-mod-icon-shape--size-small .stat-mod-icon-shape__shape {
 width:48px;
 height:48px;
 background-size:576px 240px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-1-2 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-1-3 {
 background-position:0 -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-1-4 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-1-5 {
 background-position:0 -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-2-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-2-2 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-2-3 {
 background-position:-64px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-2-4 {
 background-position:-64px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-2-5 {
 background-position:-64px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-3-1 {
 background-position:-128px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-3-2 {
 background-position:-128px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-3-3 {
 background-position:-128px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-3-4 {
 background-position:-128px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-3-5 {
 background-position:-128px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-4-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-4-2 {
 background-position:-192px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-4-3 {
 background-position:-192px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-4-4 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-4-5 {
 background-position:-192px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-5-1 {
 background-position:-256px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-5-2 {
 background-position:-256px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-5-3 {
 background-position:-256px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-5-4 {
 background-position:-256px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-5-5 {
 background-position:-256px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-6-1 {
 background-position:-320px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-6-2 {
 background-position:-320px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-6-3 {
 background-position:-320px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-6-4 {
 background-position:-320px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-1-6-5 {
 background-position:-320px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-1-2 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-1-3 {
 background-position:0 -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-1-4 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-1-5 {
 background-position:0 -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-2-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-2-2 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-2-3 {
 background-position:-64px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-2-4 {
 background-position:-64px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-2-5 {
 background-position:-64px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-3-1 {
 background-position:-128px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-3-2 {
 background-position:-128px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-3-3 {
 background-position:-128px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-3-4 {
 background-position:-128px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-3-5 {
 background-position:-128px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-4-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-4-2 {
 background-position:-192px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-4-3 {
 background-position:-192px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-4-4 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-4-5 {
 background-position:-192px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-5-1 {
 background-position:-256px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-5-2 {
 background-position:-256px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-5-3 {
 background-position:-256px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-5-4 {
 background-position:-256px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-5-5 {
 background-position:-256px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-6-1 {
 background-position:-320px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-6-2 {
 background-position:-320px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-6-3 {
 background-position:-320px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-6-4 {
 background-position:-320px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-2-6-5 {
 background-position:-320px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-1-2 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-1-3 {
 background-position:0 -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-1-4 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-1-5 {
 background-position:0 -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-2-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-2-2 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-2-3 {
 background-position:-64px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-2-4 {
 background-position:-64px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-2-5 {
 background-position:-64px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-3-1 {
 background-position:-128px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-3-2 {
 background-position:-128px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-3-3 {
 background-position:-128px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-3-4 {
 background-position:-128px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-3-5 {
 background-position:-128px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-4-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-4-2 {
 background-position:-192px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-4-3 {
 background-position:-192px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-4-4 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-4-5 {
 background-position:-192px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-5-1 {
 background-position:-256px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-5-2 {
 background-position:-256px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-5-3 {
 background-position:-256px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-5-4 {
 background-position:-256px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-5-5 {
 background-position:-256px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-6-1 {
 background-position:-320px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-6-2 {
 background-position:-320px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-6-3 {
 background-position:-320px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-6-4 {
 background-position:-320px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-3-6-5 {
 background-position:-320px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-1-2 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-1-3 {
 background-position:0 -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-1-4 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-1-5 {
 background-position:0 -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-2-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-2-2 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-2-3 {
 background-position:-64px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-2-4 {
 background-position:-64px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-2-5 {
 background-position:-64px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-3-1 {
 background-position:-128px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-3-2 {
 background-position:-128px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-3-3 {
 background-position:-128px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-3-4 {
 background-position:-128px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-3-5 {
 background-position:-128px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-4-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-4-2 {
 background-position:-192px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-4-3 {
 background-position:-192px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-4-4 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-4-5 {
 background-position:-192px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-5-1 {
 background-position:-256px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-5-2 {
 background-position:-256px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-5-3 {
 background-position:-256px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-5-4 {
 background-position:-256px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-5-5 {
 background-position:-256px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-6-1 {
 background-position:-320px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-6-2 {
 background-position:-320px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-6-3 {
 background-position:-320px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-6-4 {
 background-position:-320px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-4-6-5 {
 background-position:-320px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-1-2 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-1-3 {
 background-position:0 -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-1-4 {
 background-position:0 -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-1-5 {
 background-position:0 -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-2-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-2-2 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-2-3 {
 background-position:-64px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-2-4 {
 background-position:-64px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-2-5 {
 background-position:-64px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-3-1 {
 background-position:-128px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-3-2 {
 background-position:-128px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-3-3 {
 background-position:-128px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-3-4 {
 background-position:-128px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-3-5 {
 background-position:-128px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-4-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-4-2 {
 background-position:-192px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-4-3 {
 background-position:-192px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-4-4 {
 background-position:-192px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-4-5 {
 background-position:-192px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-5-1 {
 background-position:-256px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-5-2 {
 background-position:-256px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-5-3 {
 background-position:-256px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-5-4 {
 background-position:-256px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-5-5 {
 background-position:-256px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-6-1 {
 background-position:-320px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-6-2 {
 background-position:-320px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-6-3 {
 background-position:-320px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-6-4 {
 background-position:-320px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-5-6-5 {
 background-position:-320px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-1-1 {
 background-position:-384px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-1-2 {
 background-position:-384px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-1-3 {
 background-position:-384px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-1-4 {
 background-position:-384px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-1-5 {
 background-position:-384px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-2-1 {
 background-position:-448px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-2-2 {
 background-position:-448px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-2-3 {
 background-position:-448px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-2-4 {
 background-position:-448px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-2-5 {
 background-position:-448px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-3-1 {
 background-position:-512px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-3-2 {
 background-position:-512px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-3-3 {
 background-position:-512px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-3-4 {
 background-position:-512px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-3-5 {
 background-position:-512px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-4-1 {
 background-position:-576px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-4-2 {
 background-position:-576px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-4-3 {
 background-position:-576px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-4-4 {
 background-position:-576px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-4-5 {
 background-position:-576px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-5-1 {
 background-position:-640px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-5-2 {
 background-position:-640px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-5-3 {
 background-position:-640px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-5-4 {
 background-position:-640px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-5-5 {
 background-position:-640px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-6-1 {
 background-position:-704px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-6-2 {
 background-position:-704px -64px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-6-3 {
 background-position:-704px -128px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-6-4 {
 background-position:-704px -192px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape--key-6-6-5 {
 background-position:-704px -256px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-1-2 {
 background-position:0 -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-1-3 {
 background-position:0 -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-1-4 {
 background-position:0 -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-1-5 {
 background-position:0 -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-2-1 {
 background-position:-21px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-2-2 {
 background-position:-21px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-2-3 {
 background-position:-21px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-2-4 {
 background-position:-21px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-2-5 {
 background-position:-21px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-3-1 {
 background-position:-42px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-3-2 {
 background-position:-42px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-3-3 {
 background-position:-42px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-3-4 {
 background-position:-42px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-3-5 {
 background-position:-42px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-4-1 {
 background-position:-63px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-4-2 {
 background-position:-63px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-4-3 {
 background-position:-63px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-4-4 {
 background-position:-63px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-4-5 {
 background-position:-63px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-5-1 {
 background-position:-84px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-5-2 {
 background-position:-84px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-5-3 {
 background-position:-84px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-5-4 {
 background-position:-84px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-5-5 {
 background-position:-84px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-6-1 {
 background-position:-105px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-6-2 {
 background-position:-105px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-6-3 {
 background-position:-105px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-6-4 {
 background-position:-105px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-6-5 {
 background-position:-105px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-7-1 {
 background-position:-126px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-7-2 {
 background-position:-126px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-7-3 {
 background-position:-126px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-7-4 {
 background-position:-126px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-7-5 {
 background-position:-126px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-8-1 {
 background-position:-147px 0
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-8-2 {
 background-position:-147px -21px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-8-3 {
 background-position:-147px -42px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-8-4 {
 background-position:-147px -63px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon--key-8-5 {
 background-position:-147px -84px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__icon {
 width:21px;
 height:21px;
 background-size:168px 105px
}
.stat-mod-icon-shape--size-medium .stat-mod-icon-shape__shape {
 width:64px;
 height:64px;
 background-size:768px 320px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-1-2 {
 background-position:0 -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-1-3 {
 background-position:0 -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-1-4 {
 background-position:0 -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-1-5 {
 background-position:0 -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-2-1 {
 background-position:-90px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-2-2 {
 background-position:-90px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-2-3 {
 background-position:-90px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-2-4 {
 background-position:-90px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-2-5 {
 background-position:-90px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-3-1 {
 background-position:-180px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-3-2 {
 background-position:-180px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-3-3 {
 background-position:-180px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-3-4 {
 background-position:-180px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-3-5 {
 background-position:-180px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-4-1 {
 background-position:-270px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-4-2 {
 background-position:-270px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-4-3 {
 background-position:-270px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-4-4 {
 background-position:-270px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-4-5 {
 background-position:-270px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-5-1 {
 background-position:-360px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-5-2 {
 background-position:-360px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-5-3 {
 background-position:-360px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-5-4 {
 background-position:-360px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-5-5 {
 background-position:-360px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-6-1 {
 background-position:-450px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-6-2 {
 background-position:-450px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-6-3 {
 background-position:-450px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-6-4 {
 background-position:-450px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-1-6-5 {
 background-position:-450px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-1-2 {
 background-position:0 -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-1-3 {
 background-position:0 -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-1-4 {
 background-position:0 -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-1-5 {
 background-position:0 -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-2-1 {
 background-position:-90px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-2-2 {
 background-position:-90px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-2-3 {
 background-position:-90px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-2-4 {
 background-position:-90px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-2-5 {
 background-position:-90px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-3-1 {
 background-position:-180px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-3-2 {
 background-position:-180px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-3-3 {
 background-position:-180px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-3-4 {
 background-position:-180px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-3-5 {
 background-position:-180px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-4-1 {
 background-position:-270px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-4-2 {
 background-position:-270px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-4-3 {
 background-position:-270px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-4-4 {
 background-position:-270px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-4-5 {
 background-position:-270px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-5-1 {
 background-position:-360px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-5-2 {
 background-position:-360px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-5-3 {
 background-position:-360px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-5-4 {
 background-position:-360px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-5-5 {
 background-position:-360px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-6-1 {
 background-position:-450px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-6-2 {
 background-position:-450px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-6-3 {
 background-position:-450px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-6-4 {
 background-position:-450px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-2-6-5 {
 background-position:-450px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-1-2 {
 background-position:0 -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-1-3 {
 background-position:0 -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-1-4 {
 background-position:0 -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-1-5 {
 background-position:0 -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-2-1 {
 background-position:-90px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-2-2 {
 background-position:-90px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-2-3 {
 background-position:-90px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-2-4 {
 background-position:-90px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-2-5 {
 background-position:-90px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-3-1 {
 background-position:-180px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-3-2 {
 background-position:-180px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-3-3 {
 background-position:-180px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-3-4 {
 background-position:-180px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-3-5 {
 background-position:-180px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-4-1 {
 background-position:-270px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-4-2 {
 background-position:-270px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-4-3 {
 background-position:-270px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-4-4 {
 background-position:-270px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-4-5 {
 background-position:-270px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-5-1 {
 background-position:-360px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-5-2 {
 background-position:-360px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-5-3 {
 background-position:-360px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-5-4 {
 background-position:-360px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-5-5 {
 background-position:-360px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-6-1 {
 background-position:-450px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-6-2 {
 background-position:-450px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-6-3 {
 background-position:-450px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-6-4 {
 background-position:-450px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-3-6-5 {
 background-position:-450px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-1-2 {
 background-position:0 -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-1-3 {
 background-position:0 -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-1-4 {
 background-position:0 -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-1-5 {
 background-position:0 -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-2-1 {
 background-position:-90px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-2-2 {
 background-position:-90px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-2-3 {
 background-position:-90px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-2-4 {
 background-position:-90px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-2-5 {
 background-position:-90px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-3-1 {
 background-position:-180px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-3-2 {
 background-position:-180px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-3-3 {
 background-position:-180px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-3-4 {
 background-position:-180px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-3-5 {
 background-position:-180px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-4-1 {
 background-position:-270px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-4-2 {
 background-position:-270px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-4-3 {
 background-position:-270px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-4-4 {
 background-position:-270px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-4-5 {
 background-position:-270px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-5-1 {
 background-position:-360px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-5-2 {
 background-position:-360px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-5-3 {
 background-position:-360px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-5-4 {
 background-position:-360px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-5-5 {
 background-position:-360px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-6-1 {
 background-position:-450px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-6-2 {
 background-position:-450px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-6-3 {
 background-position:-450px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-6-4 {
 background-position:-450px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-4-6-5 {
 background-position:-450px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-1-2 {
 background-position:0 -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-1-3 {
 background-position:0 -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-1-4 {
 background-position:0 -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-1-5 {
 background-position:0 -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-2-1 {
 background-position:-90px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-2-2 {
 background-position:-90px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-2-3 {
 background-position:-90px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-2-4 {
 background-position:-90px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-2-5 {
 background-position:-90px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-3-1 {
 background-position:-180px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-3-2 {
 background-position:-180px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-3-3 {
 background-position:-180px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-3-4 {
 background-position:-180px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-3-5 {
 background-position:-180px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-4-1 {
 background-position:-270px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-4-2 {
 background-position:-270px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-4-3 {
 background-position:-270px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-4-4 {
 background-position:-270px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-4-5 {
 background-position:-270px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-5-1 {
 background-position:-360px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-5-2 {
 background-position:-360px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-5-3 {
 background-position:-360px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-5-4 {
 background-position:-360px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-5-5 {
 background-position:-360px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-6-1 {
 background-position:-450px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-6-2 {
 background-position:-450px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-6-3 {
 background-position:-450px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-6-4 {
 background-position:-450px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-5-6-5 {
 background-position:-450px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-1-1 {
 background-position:-540px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-1-2 {
 background-position:-540px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-1-3 {
 background-position:-540px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-1-4 {
 background-position:-540px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-1-5 {
 background-position:-540px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-2-1 {
 background-position:-630px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-2-2 {
 background-position:-630px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-2-3 {
 background-position:-630px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-2-4 {
 background-position:-630px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-2-5 {
 background-position:-630px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-3-1 {
 background-position:-720px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-3-2 {
 background-position:-720px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-3-3 {
 background-position:-720px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-3-4 {
 background-position:-720px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-3-5 {
 background-position:-720px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-4-1 {
 background-position:-810px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-4-2 {
 background-position:-810px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-4-3 {
 background-position:-810px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-4-4 {
 background-position:-810px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-4-5 {
 background-position:-810px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-5-1 {
 background-position:-900px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-5-2 {
 background-position:-900px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-5-3 {
 background-position:-900px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-5-4 {
 background-position:-900px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-5-5 {
 background-position:-900px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-6-1 {
 background-position:-990px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-6-2 {
 background-position:-990px -90px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-6-3 {
 background-position:-990px -180px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-6-4 {
 background-position:-990px -270px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape--key-6-6-5 {
 background-position:-990px -360px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-1-1 {
 background-position:0 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-1-2 {
 background-position:0 -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-1-3 {
 background-position:0 -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-1-4 {
 background-position:0 -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-1-5 {
 background-position:0 -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-2-1 {
 background-position:-32px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-2-2 {
 background-position:-32px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-2-3 {
 background-position:-32px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-2-4 {
 background-position:-32px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-2-5 {
 background-position:-32px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-3-1 {
 background-position:-64px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-3-2 {
 background-position:-64px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-3-3 {
 background-position:-64px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-3-4 {
 background-position:-64px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-3-5 {
 background-position:-64px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-4-1 {
 background-position:-96px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-4-2 {
 background-position:-96px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-4-3 {
 background-position:-96px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-4-4 {
 background-position:-96px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-4-5 {
 background-position:-96px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-5-1 {
 background-position:-128px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-5-2 {
 background-position:-128px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-5-3 {
 background-position:-128px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-5-4 {
 background-position:-128px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-5-5 {
 background-position:-128px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-6-1 {
 background-position:-160px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-6-2 {
 background-position:-160px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-6-3 {
 background-position:-160px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-6-4 {
 background-position:-160px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-6-5 {
 background-position:-160px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-7-1 {
 background-position:-192px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-7-2 {
 background-position:-192px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-7-3 {
 background-position:-192px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-7-4 {
 background-position:-192px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-7-5 {
 background-position:-192px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-8-1 {
 background-position:-224px 0
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-8-2 {
 background-position:-224px -32px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-8-3 {
 background-position:-224px -64px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-8-4 {
 background-position:-224px -96px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon--key-8-5 {
 background-position:-224px -128px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__icon {
 width:32px;
 height:32px;
 background-size:256px 160px
}
.stat-mod-icon-shape--size-large .stat-mod-icon-shape__shape {
 width:90px;
 height:90px;
 background-size:1080px 450px
}
.player-stat-mod-icon {
 position:relative;
 display:inline-block
}
.player-stat-mod-icon__level {
 position:absolute;
 bottom:0;
 left:4px;
 min-width:24px;
 color:#fff;
 font-weight:700;
 font-size:14px;
 border-radius:1px;
 text-align:center;
 background-color:#111;
 box-shadow:0 0 0 1px #555;
 padding:4px 3px 3px;
 line-height:1
}
.player-stat-mod-icon__level--is-max {
 color:#fc3
}
.player-stat-mod-icon--size-xsmall .player-stat-mod-icon__level {
 font-size:8px;
 padding:2px 1px 0;
 min-width:12px
}
.player-stat-mod-icon--size-xsmall .player-stat-mod-icon__level-tier {
 display:none
}
.player-stat-mod-icon--size-small .player-stat-mod-icon__level {
 font-size:8px;
 padding:2px 1px 0;
 min-width:12px
}
.player-stat-mod-icon--size-medium .player-stat-mod-icon__level {
 font-size:12px;
 padding:2px 3px 1px
}
.player-stat-mod-icon .stat-mod-icon {
 vertical-align:top
}
.player-stat-mod-stats__stats--primary {
 font-weight:700
}
.player-stat-mod-stats__stats--secondary {
 color:#888;
 font-size:11px
}
.player-stat-mod-stats__stat-value {
 font-weight:700
}
.player-stat-mod-stats__stat--is-highlighted {
 font-weight:700;
 color:#0763c7
}
.player-equipment-layout {
 position:relative;
 width:210px;
 height:195px
}
.player-equipment-layout__bg {
 background:#fff;
 width:170px;
 height:170px;
 border-radius:50%;
 border:50px solid #f0f0f0
}
.player-equipment-layout__bg,
.player-equipment-layout__heading {
 position:absolute;
 left:50%;
 top:50%;
 -webkit-transform:translate(-50%,-50%);
 transform:translate(-50%,-50%)
}
.player-equipment-layout__heading {
 color:#aaa;
 font-size:20px;
 z-index:10;
 font-weight:800
}
.player-equipment-layout__heading--tier-1 {
 color:#a5d0da
}
.player-equipment-layout__heading--tier-2,
.player-equipment-layout__heading--tier-3 {
 color:#98fd33
}
.player-equipment-layout__heading--tier-4,
.player-equipment-layout__heading--tier-5,
.player-equipment-layout__heading--tier-6 {
 color:#00bdfe
}
.player-equipment-layout__heading--tier-7,
.player-equipment-layout__heading--tier-8,
.player-equipment-layout__heading--tier-9,
.player-equipment-layout__heading--tier-10,
.player-equipment-layout__heading--tier-11 {
 color:#9241ff
}
.player-equipment-layout__heading--tier-12 {
 color:#fc3
}
.player-equipment-layout__heading--tier-13 {
 color:#f56820
}
.player-equipment-layout__levels {
 position:absolute;
 left:50%;
 top:50%;
 width:150px;
 height:150px;
 margin-left:-75px;
 margin-top:-75px
}
.player-equipment-layout__level {
 position:absolute;
 bottom:50%;
 left:50%;
 width:8px;
 height:40px;
 -webkit-transform-origin:center bottom;
 transform-origin:center bottom;
 background-size:100%;
 border-top:5px solid #ccc
}
.player-equipment-layout__level--is-current {
 border-top-width:9px;
 height:44px
}
.player-equipment-layout__level--tier-1 {
 -webkit-transform:translateX(-50%) rotate(-96deg);
 transform:translateX(-50%) rotate(-96deg);
 border-top-color:#a5d0da
}
.player-equipment-layout__level--tier-2 {
 -webkit-transform:translateX(-50%) rotate(-80deg);
 transform:translateX(-50%) rotate(-80deg);
 border-top-color:#98fd33
}
.player-equipment-layout__level--tier-3 {
 -webkit-transform:translateX(-50%) rotate(-64deg);
 transform:translateX(-50%) rotate(-64deg);
 border-top-color:#98fd33
}
.player-equipment-layout__level--tier-4 {
 -webkit-transform:translateX(-50%) rotate(-48deg);
 transform:translateX(-50%) rotate(-48deg);
 border-top-color:#00bdfe
}
.player-equipment-layout__level--tier-5 {
 -webkit-transform:translateX(-50%) rotate(-32deg);
 transform:translateX(-50%) rotate(-32deg);
 border-top-color:#00bdfe
}
.player-equipment-layout__level--tier-6 {
 -webkit-transform:translateX(-50%) rotate(-16deg);
 transform:translateX(-50%) rotate(-16deg);
 border-top-color:#00bdfe
}
.player-equipment-layout__level--tier-7 {
 -webkit-transform:translateX(-50%) rotate(0deg);
 transform:translateX(-50%) rotate(0deg);
 border-top-color:#9241ff
}
.player-equipment-layout__level--tier-8 {
 -webkit-transform:translateX(-50%) rotate(16deg);
 transform:translateX(-50%) rotate(16deg);
 border-top-color:#9241ff
}
.player-equipment-layout__level--tier-9 {
 -webkit-transform:translateX(-50%) rotate(32deg);
 transform:translateX(-50%) rotate(32deg);
 border-top-color:#9241ff
}
.player-equipment-layout__level--tier-10 {
 -webkit-transform:translateX(-50%) rotate(48deg);
 transform:translateX(-50%) rotate(48deg);
 border-top-color:#9241ff
}
.player-equipment-layout__level--tier-11 {
 -webkit-transform:translateX(-50%) rotate(64deg);
 transform:translateX(-50%) rotate(64deg);
 border-top-color:#9241ff
}
.player-equipment-layout__level--tier-12 {
 -webkit-transform:translateX(-50%) rotate(80deg);
 transform:translateX(-50%) rotate(80deg);
 border-top-color:#fc3
}
.player-equipment-layout__level--tier-13 {
 -webkit-transform:translateX(-50%) rotate(96deg);
 transform:translateX(-50%) rotate(96deg);
 border-top-color:#f56820
}
.player-equipment-layout__level--is-inactive {
 border-color:#ccc
}
.player-equipment-layout__gear {
 position:absolute;
 background-color:#aaa;
 padding:1px;
 border-radius:10px 2px 10px 6px
}
.player-equipment-layout__gear .gear-icon2:before {
 background-position:0 -144px
}
.player-equipment-layout__gear--is-empty .gear-icon2__img {
 opacity:.3
}
.player-equipment-layout__gear--is-empty .gear-icon2__inner {
 background:radial-gradient(#052254,#020321 80%)
}
.player-equipment-layout__gear--is-empty .gear-icon2__mk {
 display:none
}
.player-equipment-layout__gear--is-unobtainable .gear-icon2__img {
 opacity:1
}
.player-equipment-layout__gear--slot-0 {
 top:0;
 left:40px
}
.player-equipment-layout__gear--slot-1 {
 top:70px;
 left:0
}
.player-equipment-layout__gear--slot-2 {
 left:40px;
 top:140px
}
.player-equipment-layout__gear--slot-3 {
 right:40px;
 top:0
}
.player-equipment-layout__gear--slot-4 {
 right:0;
 top:70px
}
.player-equipment-layout__gear--slot-5 {
 right:40px;
 top:140px
}



/* page-character-detail */


@media (min-width:992px) {
 .content-container-primary-aside {
  width:250px
 }
}
.collapse {
 display:none
}
.pc-portrait .char-portrait-full {
 margin:-69px auto 15px
}
.pc-portrait .char-portrait-full-gear-level {
 display:none
}
.pc-char-overview {
 top:20px;
 left:140px
}
.pc-char-overview-name a,
.pc-char-overview-name a:active,
.pc-char-overview-name a:focus,
.pc-char-overview-name a:hover {
 color:#333
}
.pc-char-overview-tags {
 font-weight:700;
 margin-left:5px
}
.pc-char-overview-categories {
 font-size:12px;
 margin-left:5px
}
.pc-char-overview-categories a {
 color:#777
}
.char-tag a {
 color:#1e3948
}
.char-alignment {
 margin-right:5px
}
.char-alignment.char-alignment-light-side a {
 color:#3f8cba
}
.char-alignment.char-alignment-dark-side a {
 color:#b03233
}
.fb-like {
 margin-top:10px
}
.pc-statmods {
 line-height:1.2
}
.pc-statmods .statmod-full .statmod-preview,
.pc-statmods .statmod-full .statmod-stats-heading,
.pc-statmods .statmod-full .statmod-title {
 display:none
}
.pc-statmods .statmod-full .statmod-stat-value {
 color:#0763c7;
 font-weight:700
}
.pc-statmods .statmod-full .statmod-stat-label {
 margin-left:5px
}
.pc-statmods .statmod-full .statmod-stats-2 .statmod-stat-value {
 color:#888
}
.pc-statmods .statmod-stats-2 .statmod-stat {
 font-size:11px;
 color:#888;
 margin-bottom:1px
}
.pc-statmods .statmod-stats-1 .statmod-stat {
 font-weight:700;
 margin-bottom:4px
}
@media (max-width:519px) {
 .pc-statmods .collection-char-sets {
  position:absolute;
  top:15px;
  right:20px
 }
 .pc-statmods .tooltip {
  min-width:150px
 }
 .pc-statmods .pc-statmod {
  position:relative;
  margin-top:15px;
  margin-bottom:15px;
  margin-left:10px
 }
 .pc-statmods .pc-statmod-list {
  background:none;
  width:auto;
  height:auto
 }
 .pc-statmods .pc-statmod-list-sets {
  display:none
 }
 .pc-statmods .pc-statmod-list .statmod {
  left:auto;
  top:auto
 }
 .pc-statmods .statmod:after,
 .pc-statmods .statmod:before {
  display:table;
  content:"";
  clear:both
 }
 .pc-statmods .statmod-summary {
  float:left
 }
 .pc-statmods .statmod-summary .statmod-level {
  font-size:14px;
  width:22px;
  line-height:18px;
  left:31px!important;
  top:47px!important
 }
 .pc-statmods .statmod-full {
  display:block;
  position:relative;
  margin-left:70px
 }
 .pc-statmods .statmod-full .statmod-preview {
  display:none
 }
 .pc-statmods .statmod.statmod-small .statmod-img {
  width:54px;
  height:52px
 }
 .pc-statmods .statmod.statmod-small .statmod-pips {
  width:52px
 }
 .pc-statmods .statmod.statmod-small .statmod-pip {
  width:5px;
  height:5px;
  margin-right:2px
 }
}
@media (min-width:520px) {
 .pc-statmods {
  position:relative;
  width:430px;
  height:310px;
  padding-top:53px;
  margin:0 auto;
  line-height:1.2
 }
 .pc-statmods .collection-char-sets {
  position:absolute;
  text-align:center;
  top:20px;
  left:0;
  right:0
 }
 .pc-statmods .pc-statmod-list {
  margin:0 auto
 }
 .pc-statmods .statmod-full {
  display:block;
  position:absolute;
  width:170px
 }
 .pc-statmods .pc-statmod-slot1 .statmod-full {
  left:-200px;
  top:-60px
 }
 .pc-statmods .pc-statmod-slot2 .statmod-full {
  left:60px;
  top:-60px
 }
 .pc-statmods .pc-statmod-slot3 .statmod-full {
  left:-205px;
  top:-7px
 }
 .pc-statmods .pc-statmod-slot4 .statmod-full {
  left:65px;
  top:-17px
 }
 .pc-statmods .pc-statmod-slot5 .statmod-full {
  top:33px;
  left:-205px
 }
 .pc-statmods .pc-statmod-slot6 .statmod-full {
  top:33px;
  left:60px
 }
 .pc-statmods .pc-statmod-slot1 .statmod-details,
 .pc-statmods .pc-statmod-slot3 .statmod-details,
 .pc-statmods .pc-statmod-slot5 .statmod-details {
  text-align:right
 }
}
.pc-combined-stats {
 overflow:hidden
}
.pc-combined-stats-trigger {
 cursor:pointer;
 padding:15px
}
.pc-combined-stats-trigger .icon {
 margin-right:5px;
 margin-top:-2px
}
.pc-combined-stats-trigger.collapsed {
 margin-bottom:0;
 border-bottom-left-radius:4px;
 border-bottom-right-radius:4px
}
@media (min-width:400px) {
 .pc-combined-stats-list {
  -webkit-columns:2;
  -moz-columns:2;
  column-count:2
 }
}
@media (min-width:600px) {
 .pc-combined-stats-list {
  -webkit-columns:3;
  -moz-columns:3;
  column-count:3
 }
}
@media (min-width:900px) {
 .pc-combined-stats-list {
  -webkit-columns:2;
  -moz-columns:2;
  column-count:2
 }
}
@media (min-width:1200px) {
 .pc-combined-stats-list {
  -webkit-columns:3;
  -moz-columns:3;
  column-count:3
 }
}
.pc-combined-stat {
 margin-bottom:3px
}
.pc-combined-stat-value {
 font-weight:700
}
.pc-combined-stat-label {
 margin-left:6px
}
.pc-gear {
 position:relative;
 width:210px;
 height:195px;
 margin:20px auto
}
.pc-gear-bg {
 background:#fff;
 width:170px;
 height:170px;
 border-radius:50%;
 border:50px solid #f0f0f0
}
.pc-gear-bg,
.pc-gear .pc-heading {
 position:absolute;
 left:50%;
 top:50%;
 -webkit-transform:translate(-50%,-50%);
 transform:translate(-50%,-50%)
}
.pc-gear .pc-heading {
 color:#aaa;
 font-size:20px;
 z-index:10;
 font-weight:800
}
.pc-gear-t1 .pc-heading {
 color:#a5d0da
}
.pc-gear-t2 .pc-heading,
.pc-gear-t3 .pc-heading {
 color:#98fd33
}
.pc-gear-t4 .pc-heading,
.pc-gear-t5 .pc-heading,
.pc-gear-t6 .pc-heading {
 color:#00bdfe
}
.pc-gear-t7 .pc-heading,
.pc-gear-t8 .pc-heading,
.pc-gear-t9 .pc-heading,
.pc-gear-t10 .pc-heading,
.pc-gear-t11 .pc-heading {
 color:#9241ff
}
.pc-gear-t12 .pc-heading {
 color:#fc3
}
.pc-gear-t13 .pc-heading {
 color:#f56820
}
.pc-gear-levels {
 position:absolute;
 left:50%;
 top:50%;
 width:150px;
 height:150px;
 margin-left:-75px;
 margin-top:-75px
}
.pc-gear-levels-max-t11 .pc-gear-levels {
 -webkit-transform:rotate(-8deg);
 transform:rotate(-8deg)
}
.pc-gear-levels-pip {
 position:absolute;
 bottom:50%;
 left:50%;
 width:8px;
 height:40px;
 -webkit-transform-origin:center bottom;
 transform-origin:center bottom;
 background-size:100%;
 border-top:5px solid #ccc
}
.pc-gear-levels-pip-current {
 border-top-width:9px;
 height:44px
}
.pc-gear-levels-t1 {
 -webkit-transform:translateX(-50%) rotate(-96deg);
 transform:translateX(-50%) rotate(-96deg)
}
.pc-gear-levels-t2 {
 -webkit-transform:translateX(-50%) rotate(-80deg);
 transform:translateX(-50%) rotate(-80deg)
}
.pc-gear-levels-t3 {
 -webkit-transform:translateX(-50%) rotate(-64deg);
 transform:translateX(-50%) rotate(-64deg)
}
.pc-gear-levels-t4 {
 -webkit-transform:translateX(-50%) rotate(-48deg);
 transform:translateX(-50%) rotate(-48deg)
}
.pc-gear-levels-t5 {
 -webkit-transform:translateX(-50%) rotate(-32deg);
 transform:translateX(-50%) rotate(-32deg)
}
.pc-gear-levels-t6 {
 -webkit-transform:translateX(-50%) rotate(-16deg);
 transform:translateX(-50%) rotate(-16deg)
}
.pc-gear-levels-t7 {
 -webkit-transform:translateX(-50%) rotate(0deg);
 transform:translateX(-50%) rotate(0deg)
}
.pc-gear-levels-t8 {
 -webkit-transform:translateX(-50%) rotate(16deg);
 transform:translateX(-50%) rotate(16deg)
}
.pc-gear-levels-t9 {
 -webkit-transform:translateX(-50%) rotate(32deg);
 transform:translateX(-50%) rotate(32deg)
}
.pc-gear-levels-t10 {
 -webkit-transform:translateX(-50%) rotate(48deg);
 transform:translateX(-50%) rotate(48deg)
}
.pc-gear-levels-t11 {
 -webkit-transform:translateX(-50%) rotate(64deg);
 transform:translateX(-50%) rotate(64deg)
}
.pc-gear-levels-t12 {
 -webkit-transform:translateX(-50%) rotate(80deg);
 transform:translateX(-50%) rotate(80deg)
}
.pc-gear-levels-t13 {
 -webkit-transform:translateX(-50%) rotate(96deg);
 transform:translateX(-50%) rotate(96deg)
}
.pc-gear-levels-t1 {
 border-top-color:#a5d0da
}
.pc-gear-levels-t2,
.pc-gear-levels-t3 {
 border-top-color:#98fd33
}
.pc-gear-levels-t4,
.pc-gear-levels-t5,
.pc-gear-levels-t6 {
 border-top-color:#00bdfe
}
.pc-gear-levels-t7,
.pc-gear-levels-t8,
.pc-gear-levels-t9,
.pc-gear-levels-t10,
.pc-gear-levels-t11 {
 border-top-color:#9241ff
}
.pc-gear-levels-t12 {
 border-top-color:#fc3
}
.pc-gear-levels-t13 {
 border-top-color:#f56820
}
.pc-gear-levels-pip-inactive {
 border-color:#ccc
}
.pc-slot {
 position:absolute;
 background-color:#aaa;
 padding:1px;
 border-radius:10px 2px 10px 6px
}
.pc-slot-preview {
 cursor:pointer
}
.pc-slot-preview .gear-icon:before {
 background-position:0 -144px
}
.pc-slot-preview .tooltip {
 min-width:125px
}
.pc-slot-needed .pc-slot-preview .gear-icon-img {
 opacity:.3
}
.pc-slot-needed .pc-slot-preview .gear-icon-inner {
 background:radial-gradient(#052254,#020321 80%)
}
.pc-slot-needed .pc-slot-preview .gear-icon-mk-level {
 display:none
}
.pc-slot-unknown .pc-slot-preview .gear-icon-img {
 opacity:1
}
.pc-slot0 {
 top:0;
 left:40px
}
.pc-slot1 {
 top:70px;
 left:0
}
.pc-slot2 {
 left:40px;
 top:140px
}
.pc-slot3 {
 right:40px;
 top:0
}
.pc-slot4 {
 right:0;
 top:70px
}
.pc-slot5 {
 right:40px;
 top:140px
}
@media (min-width:990px) and (max-width:1260px) {
 .pc-gear {
  width:185px
 }
 .pc-gear-bg {
  width:160px;
  height:160px
 }
 .pc-gear-levels-pip {
  width:7px;
  height:35px
 }
 .pc-gear-levels-pip-current {
  height:39px
 }
 .pc-slot1,
 .pc-slot3 {
  left:30px
 }
 .pc-slot4,
 .pc-slot6 {
  right:30px
 }
}
.pc-skills-list {
 display:flex;
 flex-wrap:wrap
}
.pc-skills-list-item {
 width:20%;
 display:flex;
 justify-content:center;
 margin-bottom:5px
}
.pc-skill {
 position:relative;
 width:86px;
}
.pc-skill-levels {
 display:table;
 width:100%;
 margin-bottom:4px;
 position:relative;
 border-spacing:2px
}
.pc-skill-levels-pip {
 height:5px;
 display:table-cell;
 border-radius:2px;
 background-color:#e2e1e1;
 border:1px solid #c7c4c4
}
.pc-skill-levels-pip-active {
 background-color:#32cd32;
 border-color:#00b100
}
.pc-skill-levels-pip-max {
 background-color:gold;
 border-color:#e4c77d
}
.pc-skill-levels-pip-zeta {
 background-color:#742cbc;
 border-color:#020205
}
.pc-skill-link,
.pc-skill-link:active,
.pc-skill-link:focus,
.pc-skill-link:hover {
 color:#1e3948
}
.pc-skill-name {
 font-weight:700;
 margin:5px 0 0;
 text-align:center;
 line-height:1.2;
 font-size:11px
}
.pc-skill__material {
 position:absolute;
 top:-10px; /* FIX was 83px*/
 right:0px; /* FIX was -9px*/
 /* background:#fff; */
 /* border-radius:50%; */
 /* border:3px solid #fff */
}
.pc-skill__material-img {
 opacity:.3;
 width:18px;
 display:block;
 -webkit-filter:grayscale(1);
 filter:grayscale(1)
}
.pc-skill--maxed .pc-skill__material-img {
 opacity:1;
 -webkit-filter:grayscale(0);
 filter:grayscale(0)
}
.pc-stat {
 margin-bottom:3px;
 font-size:12px
}
.pc-stat-value {
 float:right;
 line-height:1.2
}
.pc-stat-modified .pc-stat-value {
 color:#0763c7;
 font-weight:700
}
.pc-stat-primary .pc-stat-label {
 color:#00ca00
}
.pc-needed-gear {
 display:inline-block;
 vertical-align:top;
 margin:5px
}
.pc-needed-gear-count {
 text-align:center;
 font-weight:700
}
.unit-gp-stats {
 display:table
}
.unit-gp-stats-header {
 display:table-row
}
.unit-gp-stats-header-cell {
 display:table-cell;
 vertical-align:middle;
 font-weight:700;
 text-transform:uppercase;
 line-height:1;
 font-size:10px;
 text-align:right;
 border-bottom:1px dotted #eaeaea;
 padding-bottom:4px
}
.unit-gp-stat {
 display:table-row;
 line-height:1.2
}
.unit-gp-stat-cell {
 display:table-cell;
 vertical-align:middle;
 padding:4px 0
}
.unit-gp-stat-label {
 font-weight:700
}
.unit-gp-stat-percent {
 display:flex
}
.unit-gp-stat-percent-symbol {
 font-size:10px
}
.unit-gp-stat-percent-value {
 font-size:12px
}
.unit-gp-stat-amount {
 padding-left:10px;
 display:flex;
 align-items:flex-end;
 justify-content:flex-end
}
.unit-gp-stat-amount-sep {
 margin:0 4px;
 color:#ccc
}
.unit-gp-stat-amount-current {
 font-size:12px
}
.unit-gp-stat-amount-max {
 font-weight:700
}
.unit-gp-stat-diff {
 display:block;
 text-align:right;
 padding-left:15px;
 font-size:11px;
 font-weight:700;
 color:#999
}
.unit-gp-stat-complete .unit-gp-stat-percent {
 font-weight:700
}
.unit-gp-stat-complete .unit-gp-stat-amount-current {
 font-size:14px;
 font-weight:700
}
.unit-gp-progress {
 background:#ccc;
 height:5px;
 border-radius:10px;
 overflow:hidden;
 flex:1;
 width:80px;
 margin:0 5px
}
.unit-gp-progress-bar {
 height:100%;
 background:#617a88;
 border-radius:10px
}
@media (max-width:400px) {
 .unit-gp-stat-label,
 .unit-gp-stats {
  width:100%
 }
 .unit-gp-stat-amount {
  flex-direction:column
 }
 .unit-gp-stat-amount-sep {
  display:none
 }
 .unit-gp-progress {
  width:50px
 }
}
@media (min-width:401px) {
 .unit-gp-stat-label {
  padding-right:10px
 }
 .unit-gp-progress {
  width:100px
 }
}

/* statmods */


.dataTables_wrapper .row {
 margin:0
}
.dataTables_wrapper .row>div {
 overflow:auto;
 padding:0;
 min-height:0
}
.dataTables_wrapper .row .dataTable thead th {
 cursor:pointer
}
.dataTables_wrapper .row .dataTable thead th:hover {
 background-color:#d6d6d6
}
.dataTables_wrapper .row .dataTable thead th:active {
 background-color:#c2c2c2
}
.dataTables_wrapper .row .dataTable thead th:focus {
 outline:none
}
.dataTables_wrapper .row .dataTable thead th.sorting_asc,
.dataTables_wrapper .row .dataTable thead th.sorting_desc {
 background-repeat:no-repeat;
 background-position:center 2px
}
.dataTables_wrapper .row .dataTable thead th.sorting_asc {
 background-image:url(https://swgoh.gg/static/img/sort-asc.png)
}
.dataTables_wrapper .row .dataTable thead th.sorting_desc {
 background-image:url(https://swgoh.gg/static/img/sort-desc.png)
}
.dataTable {
 margin-bottom:0
}
.dataTable thead {
 background-color:#ebebeb
}
.dataTable thead th {
 vertical-align:middle!important;
 border-bottom:0!important
}
.dataTable tbody td {
 vertical-align:middle!important;
 white-space:nowrap
}
.dataTable tbody td .char-portrait-full-micro {
 display:inline-block;
 margin:3px 9px 3px 0
}
.dataTable tbody td .statmod-small {
 display:inline-block;
 cursor:pointer;
 margin-left:-4px
}
.dataTable tbody td .statmod-small:first-child {
 margin-left:0
}
.dataTable tbody td .statmod-small .statmod-img {
 width:39px;
 height:36px
}
.pagination {
 margin-top:10px!important;
 margin-bottom:-6px
}
.statmod.statmod-small .statmod-img {
 width:35px;
 height:32px;
 margin-top:2px
}
.statmod.statmod-small .statmod-pips {
 margin-bottom:0;
 width:31px;
 padding:1px;
 border-radius:3px
}
.statmod.statmod-small .statmod-pip {
 width:3px;
 height:4px;
 margin-right:1px
}
.statmod.statmod-small .statmod-pip:first-child {
 margin-left:1px
}
.statmod-summary {
 display:inline-block;
 vertical-align:top
}
.statmod-base {
 position:relative
}
.statmod-base-icon {
 width:32px;
 height:32px;
 background:0 0 transparent url(https://swgoh.gg/static/img/ui/mod-icon-atlas.png) no-repeat;
 position:absolute
}
.statmod-base-shape {
 width:90px;
 height:90px;
 background:0 0 transparent url(https://swgoh.gg/static/img/ui/mod-shape-atlas.png) no-repeat
}
.statmod-base--slot-1 .statmod-base-icon {
 left:41%;
 top:24%
}
.statmod-base--slot-2 .statmod-base-icon {
 left:44%;
 top:19%;
 -webkit-transform:scale(.8);
 transform:scale(.8)
}
.statmod-base--slot-3 .statmod-base-icon {
 left:32%;
 top:32%;
 -webkit-transform:scale(.9);
 transform:scale(.9)
}
.statmod-base--slot-4 .statmod-base-icon {
 left:32%;
 top:40%;
 -webkit-transform:scale(.7);
 transform:scale(.7)
}
.statmod-base--slot-5 .statmod-base-icon {
 left:33%;
 top:33%;
 -webkit-transform:scale(.8);
 transform:scale(.8)
}
.statmod-base--slot-6 .statmod-base-icon {
 left:32%;
 top:34%;
 -webkit-transform:scale(.85);
 transform:scale(.85)
}
.statmod-base .statmod-base-inner--shapekey-1-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base .statmod-base-inner--shapekey-1-1-2 .statmod-base-shape {
 background-position:0 -90px
}
.statmod-base .statmod-base-inner--shapekey-1-1-3 .statmod-base-shape {
 background-position:0 -180px
}
.statmod-base .statmod-base-inner--shapekey-1-1-4 .statmod-base-shape {
 background-position:0 -270px
}
.statmod-base .statmod-base-inner--shapekey-1-1-5 .statmod-base-shape {
 background-position:0 -360px
}
.statmod-base .statmod-base-inner--shapekey-1-2-1 .statmod-base-shape {
 background-position:-90px 0
}
.statmod-base .statmod-base-inner--shapekey-1-2-2 .statmod-base-shape {
 background-position:-90px -90px
}
.statmod-base .statmod-base-inner--shapekey-1-2-3 .statmod-base-shape {
 background-position:-90px -180px
}
.statmod-base .statmod-base-inner--shapekey-1-2-4 .statmod-base-shape {
 background-position:-90px -270px
}
.statmod-base .statmod-base-inner--shapekey-1-2-5 .statmod-base-shape {
 background-position:-90px -360px
}
.statmod-base .statmod-base-inner--shapekey-1-3-1 .statmod-base-shape {
 background-position:-180px 0
}
.statmod-base .statmod-base-inner--shapekey-1-3-2 .statmod-base-shape {
 background-position:-180px -90px
}
.statmod-base .statmod-base-inner--shapekey-1-3-3 .statmod-base-shape {
 background-position:-180px -180px
}
.statmod-base .statmod-base-inner--shapekey-1-3-4 .statmod-base-shape {
 background-position:-180px -270px
}
.statmod-base .statmod-base-inner--shapekey-1-3-5 .statmod-base-shape {
 background-position:-180px -360px
}
.statmod-base .statmod-base-inner--shapekey-1-4-1 .statmod-base-shape {
 background-position:-270px 0
}
.statmod-base .statmod-base-inner--shapekey-1-4-2 .statmod-base-shape {
 background-position:-270px -90px
}
.statmod-base .statmod-base-inner--shapekey-1-4-3 .statmod-base-shape {
 background-position:-270px -180px
}
.statmod-base .statmod-base-inner--shapekey-1-4-4 .statmod-base-shape {
 background-position:-270px -270px
}
.statmod-base .statmod-base-inner--shapekey-1-4-5 .statmod-base-shape {
 background-position:-270px -360px
}
.statmod-base .statmod-base-inner--shapekey-1-5-1 .statmod-base-shape {
 background-position:-360px 0
}
.statmod-base .statmod-base-inner--shapekey-1-5-2 .statmod-base-shape {
 background-position:-360px -90px
}
.statmod-base .statmod-base-inner--shapekey-1-5-3 .statmod-base-shape {
 background-position:-360px -180px
}
.statmod-base .statmod-base-inner--shapekey-1-5-4 .statmod-base-shape {
 background-position:-360px -270px
}
.statmod-base .statmod-base-inner--shapekey-1-5-5 .statmod-base-shape {
 background-position:-360px -360px
}
.statmod-base .statmod-base-inner--shapekey-1-6-1 .statmod-base-shape {
 background-position:-450px 0
}
.statmod-base .statmod-base-inner--shapekey-1-6-2 .statmod-base-shape {
 background-position:-450px -90px
}
.statmod-base .statmod-base-inner--shapekey-1-6-3 .statmod-base-shape {
 background-position:-450px -180px
}
.statmod-base .statmod-base-inner--shapekey-1-6-4 .statmod-base-shape {
 background-position:-450px -270px
}
.statmod-base .statmod-base-inner--shapekey-1-6-5 .statmod-base-shape {
 background-position:-450px -360px
}
.statmod-base .statmod-base-inner--shapekey-2-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base .statmod-base-inner--shapekey-2-1-2 .statmod-base-shape {
 background-position:0 -90px
}
.statmod-base .statmod-base-inner--shapekey-2-1-3 .statmod-base-shape {
 background-position:0 -180px
}
.statmod-base .statmod-base-inner--shapekey-2-1-4 .statmod-base-shape {
 background-position:0 -270px
}
.statmod-base .statmod-base-inner--shapekey-2-1-5 .statmod-base-shape {
 background-position:0 -360px
}
.statmod-base .statmod-base-inner--shapekey-2-2-1 .statmod-base-shape {
 background-position:-90px 0
}
.statmod-base .statmod-base-inner--shapekey-2-2-2 .statmod-base-shape {
 background-position:-90px -90px
}
.statmod-base .statmod-base-inner--shapekey-2-2-3 .statmod-base-shape {
 background-position:-90px -180px
}
.statmod-base .statmod-base-inner--shapekey-2-2-4 .statmod-base-shape {
 background-position:-90px -270px
}
.statmod-base .statmod-base-inner--shapekey-2-2-5 .statmod-base-shape {
 background-position:-90px -360px
}
.statmod-base .statmod-base-inner--shapekey-2-3-1 .statmod-base-shape {
 background-position:-180px 0
}
.statmod-base .statmod-base-inner--shapekey-2-3-2 .statmod-base-shape {
 background-position:-180px -90px
}
.statmod-base .statmod-base-inner--shapekey-2-3-3 .statmod-base-shape {
 background-position:-180px -180px
}
.statmod-base .statmod-base-inner--shapekey-2-3-4 .statmod-base-shape {
 background-position:-180px -270px
}
.statmod-base .statmod-base-inner--shapekey-2-3-5 .statmod-base-shape {
 background-position:-180px -360px
}
.statmod-base .statmod-base-inner--shapekey-2-4-1 .statmod-base-shape {
 background-position:-270px 0
}
.statmod-base .statmod-base-inner--shapekey-2-4-2 .statmod-base-shape {
 background-position:-270px -90px
}
.statmod-base .statmod-base-inner--shapekey-2-4-3 .statmod-base-shape {
 background-position:-270px -180px
}
.statmod-base .statmod-base-inner--shapekey-2-4-4 .statmod-base-shape {
 background-position:-270px -270px
}
.statmod-base .statmod-base-inner--shapekey-2-4-5 .statmod-base-shape {
 background-position:-270px -360px
}
.statmod-base .statmod-base-inner--shapekey-2-5-1 .statmod-base-shape {
 background-position:-360px 0
}
.statmod-base .statmod-base-inner--shapekey-2-5-2 .statmod-base-shape {
 background-position:-360px -90px
}
.statmod-base .statmod-base-inner--shapekey-2-5-3 .statmod-base-shape {
 background-position:-360px -180px
}
.statmod-base .statmod-base-inner--shapekey-2-5-4 .statmod-base-shape {
 background-position:-360px -270px
}
.statmod-base .statmod-base-inner--shapekey-2-5-5 .statmod-base-shape {
 background-position:-360px -360px
}
.statmod-base .statmod-base-inner--shapekey-2-6-1 .statmod-base-shape {
 background-position:-450px 0
}
.statmod-base .statmod-base-inner--shapekey-2-6-2 .statmod-base-shape {
 background-position:-450px -90px
}
.statmod-base .statmod-base-inner--shapekey-2-6-3 .statmod-base-shape {
 background-position:-450px -180px
}
.statmod-base .statmod-base-inner--shapekey-2-6-4 .statmod-base-shape {
 background-position:-450px -270px
}
.statmod-base .statmod-base-inner--shapekey-2-6-5 .statmod-base-shape {
 background-position:-450px -360px
}
.statmod-base .statmod-base-inner--shapekey-3-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base .statmod-base-inner--shapekey-3-1-2 .statmod-base-shape {
 background-position:0 -90px
}
.statmod-base .statmod-base-inner--shapekey-3-1-3 .statmod-base-shape {
 background-position:0 -180px
}
.statmod-base .statmod-base-inner--shapekey-3-1-4 .statmod-base-shape {
 background-position:0 -270px
}
.statmod-base .statmod-base-inner--shapekey-3-1-5 .statmod-base-shape {
 background-position:0 -360px
}
.statmod-base .statmod-base-inner--shapekey-3-2-1 .statmod-base-shape {
 background-position:-90px 0
}
.statmod-base .statmod-base-inner--shapekey-3-2-2 .statmod-base-shape {
 background-position:-90px -90px
}
.statmod-base .statmod-base-inner--shapekey-3-2-3 .statmod-base-shape {
 background-position:-90px -180px
}
.statmod-base .statmod-base-inner--shapekey-3-2-4 .statmod-base-shape {
 background-position:-90px -270px
}
.statmod-base .statmod-base-inner--shapekey-3-2-5 .statmod-base-shape {
 background-position:-90px -360px
}
.statmod-base .statmod-base-inner--shapekey-3-3-1 .statmod-base-shape {
 background-position:-180px 0
}
.statmod-base .statmod-base-inner--shapekey-3-3-2 .statmod-base-shape {
 background-position:-180px -90px
}
.statmod-base .statmod-base-inner--shapekey-3-3-3 .statmod-base-shape {
 background-position:-180px -180px
}
.statmod-base .statmod-base-inner--shapekey-3-3-4 .statmod-base-shape {
 background-position:-180px -270px
}
.statmod-base .statmod-base-inner--shapekey-3-3-5 .statmod-base-shape {
 background-position:-180px -360px
}
.statmod-base .statmod-base-inner--shapekey-3-4-1 .statmod-base-shape {
 background-position:-270px 0
}
.statmod-base .statmod-base-inner--shapekey-3-4-2 .statmod-base-shape {
 background-position:-270px -90px
}
.statmod-base .statmod-base-inner--shapekey-3-4-3 .statmod-base-shape {
 background-position:-270px -180px
}
.statmod-base .statmod-base-inner--shapekey-3-4-4 .statmod-base-shape {
 background-position:-270px -270px
}
.statmod-base .statmod-base-inner--shapekey-3-4-5 .statmod-base-shape {
 background-position:-270px -360px
}
.statmod-base .statmod-base-inner--shapekey-3-5-1 .statmod-base-shape {
 background-position:-360px 0
}
.statmod-base .statmod-base-inner--shapekey-3-5-2 .statmod-base-shape {
 background-position:-360px -90px
}
.statmod-base .statmod-base-inner--shapekey-3-5-3 .statmod-base-shape {
 background-position:-360px -180px
}
.statmod-base .statmod-base-inner--shapekey-3-5-4 .statmod-base-shape {
 background-position:-360px -270px
}
.statmod-base .statmod-base-inner--shapekey-3-5-5 .statmod-base-shape {
 background-position:-360px -360px
}
.statmod-base .statmod-base-inner--shapekey-3-6-1 .statmod-base-shape {
 background-position:-450px 0
}
.statmod-base .statmod-base-inner--shapekey-3-6-2 .statmod-base-shape {
 background-position:-450px -90px
}
.statmod-base .statmod-base-inner--shapekey-3-6-3 .statmod-base-shape {
 background-position:-450px -180px
}
.statmod-base .statmod-base-inner--shapekey-3-6-4 .statmod-base-shape {
 background-position:-450px -270px
}
.statmod-base .statmod-base-inner--shapekey-3-6-5 .statmod-base-shape {
 background-position:-450px -360px
}
.statmod-base .statmod-base-inner--shapekey-4-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base .statmod-base-inner--shapekey-4-1-2 .statmod-base-shape {
 background-position:0 -90px
}
.statmod-base .statmod-base-inner--shapekey-4-1-3 .statmod-base-shape {
 background-position:0 -180px
}
.statmod-base .statmod-base-inner--shapekey-4-1-4 .statmod-base-shape {
 background-position:0 -270px
}
.statmod-base .statmod-base-inner--shapekey-4-1-5 .statmod-base-shape {
 background-position:0 -360px
}
.statmod-base .statmod-base-inner--shapekey-4-2-1 .statmod-base-shape {
 background-position:-90px 0
}
.statmod-base .statmod-base-inner--shapekey-4-2-2 .statmod-base-shape {
 background-position:-90px -90px
}
.statmod-base .statmod-base-inner--shapekey-4-2-3 .statmod-base-shape {
 background-position:-90px -180px
}
.statmod-base .statmod-base-inner--shapekey-4-2-4 .statmod-base-shape {
 background-position:-90px -270px
}
.statmod-base .statmod-base-inner--shapekey-4-2-5 .statmod-base-shape {
 background-position:-90px -360px
}
.statmod-base .statmod-base-inner--shapekey-4-3-1 .statmod-base-shape {
 background-position:-180px 0
}
.statmod-base .statmod-base-inner--shapekey-4-3-2 .statmod-base-shape {
 background-position:-180px -90px
}
.statmod-base .statmod-base-inner--shapekey-4-3-3 .statmod-base-shape {
 background-position:-180px -180px
}
.statmod-base .statmod-base-inner--shapekey-4-3-4 .statmod-base-shape {
 background-position:-180px -270px
}
.statmod-base .statmod-base-inner--shapekey-4-3-5 .statmod-base-shape {
 background-position:-180px -360px
}
.statmod-base .statmod-base-inner--shapekey-4-4-1 .statmod-base-shape {
 background-position:-270px 0
}
.statmod-base .statmod-base-inner--shapekey-4-4-2 .statmod-base-shape {
 background-position:-270px -90px
}
.statmod-base .statmod-base-inner--shapekey-4-4-3 .statmod-base-shape {
 background-position:-270px -180px
}
.statmod-base .statmod-base-inner--shapekey-4-4-4 .statmod-base-shape {
 background-position:-270px -270px
}
.statmod-base .statmod-base-inner--shapekey-4-4-5 .statmod-base-shape {
 background-position:-270px -360px
}
.statmod-base .statmod-base-inner--shapekey-4-5-1 .statmod-base-shape {
 background-position:-360px 0
}
.statmod-base .statmod-base-inner--shapekey-4-5-2 .statmod-base-shape {
 background-position:-360px -90px
}
.statmod-base .statmod-base-inner--shapekey-4-5-3 .statmod-base-shape {
 background-position:-360px -180px
}
.statmod-base .statmod-base-inner--shapekey-4-5-4 .statmod-base-shape {
 background-position:-360px -270px
}
.statmod-base .statmod-base-inner--shapekey-4-5-5 .statmod-base-shape {
 background-position:-360px -360px
}
.statmod-base .statmod-base-inner--shapekey-4-6-1 .statmod-base-shape {
 background-position:-450px 0
}
.statmod-base .statmod-base-inner--shapekey-4-6-2 .statmod-base-shape {
 background-position:-450px -90px
}
.statmod-base .statmod-base-inner--shapekey-4-6-3 .statmod-base-shape {
 background-position:-450px -180px
}
.statmod-base .statmod-base-inner--shapekey-4-6-4 .statmod-base-shape {
 background-position:-450px -270px
}
.statmod-base .statmod-base-inner--shapekey-4-6-5 .statmod-base-shape {
 background-position:-450px -360px
}
.statmod-base .statmod-base-inner--shapekey-5-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base .statmod-base-inner--shapekey-5-1-2 .statmod-base-shape {
 background-position:0 -90px
}
.statmod-base .statmod-base-inner--shapekey-5-1-3 .statmod-base-shape {
 background-position:0 -180px
}
.statmod-base .statmod-base-inner--shapekey-5-1-4 .statmod-base-shape {
 background-position:0 -270px
}
.statmod-base .statmod-base-inner--shapekey-5-1-5 .statmod-base-shape {
 background-position:0 -360px
}
.statmod-base .statmod-base-inner--shapekey-5-2-1 .statmod-base-shape {
 background-position:-90px 0
}
.statmod-base .statmod-base-inner--shapekey-5-2-2 .statmod-base-shape {
 background-position:-90px -90px
}
.statmod-base .statmod-base-inner--shapekey-5-2-3 .statmod-base-shape {
 background-position:-90px -180px
}
.statmod-base .statmod-base-inner--shapekey-5-2-4 .statmod-base-shape {
 background-position:-90px -270px
}
.statmod-base .statmod-base-inner--shapekey-5-2-5 .statmod-base-shape {
 background-position:-90px -360px
}
.statmod-base .statmod-base-inner--shapekey-5-3-1 .statmod-base-shape {
 background-position:-180px 0
}
.statmod-base .statmod-base-inner--shapekey-5-3-2 .statmod-base-shape {
 background-position:-180px -90px
}
.statmod-base .statmod-base-inner--shapekey-5-3-3 .statmod-base-shape {
 background-position:-180px -180px
}
.statmod-base .statmod-base-inner--shapekey-5-3-4 .statmod-base-shape {
 background-position:-180px -270px
}
.statmod-base .statmod-base-inner--shapekey-5-3-5 .statmod-base-shape {
 background-position:-180px -360px
}
.statmod-base .statmod-base-inner--shapekey-5-4-1 .statmod-base-shape {
 background-position:-270px 0
}
.statmod-base .statmod-base-inner--shapekey-5-4-2 .statmod-base-shape {
 background-position:-270px -90px
}
.statmod-base .statmod-base-inner--shapekey-5-4-3 .statmod-base-shape {
 background-position:-270px -180px
}
.statmod-base .statmod-base-inner--shapekey-5-4-4 .statmod-base-shape {
 background-position:-270px -270px
}
.statmod-base .statmod-base-inner--shapekey-5-4-5 .statmod-base-shape {
 background-position:-270px -360px
}
.statmod-base .statmod-base-inner--shapekey-5-5-1 .statmod-base-shape {
 background-position:-360px 0
}
.statmod-base .statmod-base-inner--shapekey-5-5-2 .statmod-base-shape {
 background-position:-360px -90px
}
.statmod-base .statmod-base-inner--shapekey-5-5-3 .statmod-base-shape {
 background-position:-360px -180px
}
.statmod-base .statmod-base-inner--shapekey-5-5-4 .statmod-base-shape {
 background-position:-360px -270px
}
.statmod-base .statmod-base-inner--shapekey-5-5-5 .statmod-base-shape {
 background-position:-360px -360px
}
.statmod-base .statmod-base-inner--shapekey-5-6-1 .statmod-base-shape {
 background-position:-450px 0
}
.statmod-base .statmod-base-inner--shapekey-5-6-2 .statmod-base-shape {
 background-position:-450px -90px
}
.statmod-base .statmod-base-inner--shapekey-5-6-3 .statmod-base-shape {
 background-position:-450px -180px
}
.statmod-base .statmod-base-inner--shapekey-5-6-4 .statmod-base-shape {
 background-position:-450px -270px
}
.statmod-base .statmod-base-inner--shapekey-5-6-5 .statmod-base-shape {
 background-position:-450px -360px
}
.statmod-base .statmod-base-inner--shapekey-6-1-1 .statmod-base-shape {
 background-position:-540px 0
}
.statmod-base .statmod-base-inner--shapekey-6-1-2 .statmod-base-shape {
 background-position:-540px -90px
}
.statmod-base .statmod-base-inner--shapekey-6-1-3 .statmod-base-shape {
 background-position:-540px -180px
}
.statmod-base .statmod-base-inner--shapekey-6-1-4 .statmod-base-shape {
 background-position:-540px -270px
}
.statmod-base .statmod-base-inner--shapekey-6-1-5 .statmod-base-shape {
 background-position:-540px -360px
}
.statmod-base .statmod-base-inner--shapekey-6-2-1 .statmod-base-shape {
 background-position:-630px 0
}
.statmod-base .statmod-base-inner--shapekey-6-2-2 .statmod-base-shape {
 background-position:-630px -90px
}
.statmod-base .statmod-base-inner--shapekey-6-2-3 .statmod-base-shape {
 background-position:-630px -180px
}
.statmod-base .statmod-base-inner--shapekey-6-2-4 .statmod-base-shape {
 background-position:-630px -270px
}
.statmod-base .statmod-base-inner--shapekey-6-2-5 .statmod-base-shape {
 background-position:-630px -360px
}
.statmod-base .statmod-base-inner--shapekey-6-3-1 .statmod-base-shape {
 background-position:-720px 0
}
.statmod-base .statmod-base-inner--shapekey-6-3-2 .statmod-base-shape {
 background-position:-720px -90px
}
.statmod-base .statmod-base-inner--shapekey-6-3-3 .statmod-base-shape {
 background-position:-720px -180px
}
.statmod-base .statmod-base-inner--shapekey-6-3-4 .statmod-base-shape {
 background-position:-720px -270px
}
.statmod-base .statmod-base-inner--shapekey-6-3-5 .statmod-base-shape {
 background-position:-720px -360px
}
.statmod-base .statmod-base-inner--shapekey-6-4-1 .statmod-base-shape {
 background-position:-810px 0
}
.statmod-base .statmod-base-inner--shapekey-6-4-2 .statmod-base-shape {
 background-position:-810px -90px
}
.statmod-base .statmod-base-inner--shapekey-6-4-3 .statmod-base-shape {
 background-position:-810px -180px
}
.statmod-base .statmod-base-inner--shapekey-6-4-4 .statmod-base-shape {
 background-position:-810px -270px
}
.statmod-base .statmod-base-inner--shapekey-6-4-5 .statmod-base-shape {
 background-position:-810px -360px
}
.statmod-base .statmod-base-inner--shapekey-6-5-1 .statmod-base-shape {
 background-position:-900px 0
}
.statmod-base .statmod-base-inner--shapekey-6-5-2 .statmod-base-shape {
 background-position:-900px -90px
}
.statmod-base .statmod-base-inner--shapekey-6-5-3 .statmod-base-shape {
 background-position:-900px -180px
}
.statmod-base .statmod-base-inner--shapekey-6-5-4 .statmod-base-shape {
 background-position:-900px -270px
}
.statmod-base .statmod-base-inner--shapekey-6-5-5 .statmod-base-shape {
 background-position:-900px -360px
}
.statmod-base .statmod-base-inner--shapekey-6-6-1 .statmod-base-shape {
 background-position:-990px 0
}
.statmod-base .statmod-base-inner--shapekey-6-6-2 .statmod-base-shape {
 background-position:-990px -90px
}
.statmod-base .statmod-base-inner--shapekey-6-6-3 .statmod-base-shape {
 background-position:-990px -180px
}
.statmod-base .statmod-base-inner--shapekey-6-6-4 .statmod-base-shape {
 background-position:-990px -270px
}
.statmod-base .statmod-base-inner--shapekey-6-6-5 .statmod-base-shape {
 background-position:-990px -360px
}
.statmod-base .statmod-base-inner--iconkey-1-1 .statmod-base-icon {
 background-position:0 0
}
.statmod-base .statmod-base-inner--iconkey-1-2 .statmod-base-icon {
 background-position:0 -32px
}
.statmod-base .statmod-base-inner--iconkey-1-3 .statmod-base-icon {
 background-position:0 -64px
}
.statmod-base .statmod-base-inner--iconkey-1-4 .statmod-base-icon {
 background-position:0 -96px
}
.statmod-base .statmod-base-inner--iconkey-1-5 .statmod-base-icon {
 background-position:0 -128px
}
.statmod-base .statmod-base-inner--iconkey-2-1 .statmod-base-icon {
 background-position:-32px 0
}
.statmod-base .statmod-base-inner--iconkey-2-2 .statmod-base-icon {
 background-position:-32px -32px
}
.statmod-base .statmod-base-inner--iconkey-2-3 .statmod-base-icon {
 background-position:-32px -64px
}
.statmod-base .statmod-base-inner--iconkey-2-4 .statmod-base-icon {
 background-position:-32px -96px
}
.statmod-base .statmod-base-inner--iconkey-2-5 .statmod-base-icon {
 background-position:-32px -128px
}
.statmod-base .statmod-base-inner--iconkey-3-1 .statmod-base-icon {
 background-position:-64px 0
}
.statmod-base .statmod-base-inner--iconkey-3-2 .statmod-base-icon {
 background-position:-64px -32px
}
.statmod-base .statmod-base-inner--iconkey-3-3 .statmod-base-icon {
 background-position:-64px -64px
}
.statmod-base .statmod-base-inner--iconkey-3-4 .statmod-base-icon {
 background-position:-64px -96px
}
.statmod-base .statmod-base-inner--iconkey-3-5 .statmod-base-icon {
 background-position:-64px -128px
}
.statmod-base .statmod-base-inner--iconkey-4-1 .statmod-base-icon {
 background-position:-96px 0
}
.statmod-base .statmod-base-inner--iconkey-4-2 .statmod-base-icon {
 background-position:-96px -32px
}
.statmod-base .statmod-base-inner--iconkey-4-3 .statmod-base-icon {
 background-position:-96px -64px
}
.statmod-base .statmod-base-inner--iconkey-4-4 .statmod-base-icon {
 background-position:-96px -96px
}
.statmod-base .statmod-base-inner--iconkey-4-5 .statmod-base-icon {
 background-position:-96px -128px
}
.statmod-base .statmod-base-inner--iconkey-5-1 .statmod-base-icon {
 background-position:-128px 0
}
.statmod-base .statmod-base-inner--iconkey-5-2 .statmod-base-icon {
 background-position:-128px -32px
}
.statmod-base .statmod-base-inner--iconkey-5-3 .statmod-base-icon {
 background-position:-128px -64px
}
.statmod-base .statmod-base-inner--iconkey-5-4 .statmod-base-icon {
 background-position:-128px -96px
}
.statmod-base .statmod-base-inner--iconkey-5-5 .statmod-base-icon {
 background-position:-128px -128px
}
.statmod-base .statmod-base-inner--iconkey-6-1 .statmod-base-icon {
 background-position:-160px 0
}
.statmod-base .statmod-base-inner--iconkey-6-2 .statmod-base-icon {
 background-position:-160px -32px
}
.statmod-base .statmod-base-inner--iconkey-6-3 .statmod-base-icon {
 background-position:-160px -64px
}
.statmod-base .statmod-base-inner--iconkey-6-4 .statmod-base-icon {
 background-position:-160px -96px
}
.statmod-base .statmod-base-inner--iconkey-6-5 .statmod-base-icon {
 background-position:-160px -128px
}
.statmod-base .statmod-base-inner--iconkey-7-1 .statmod-base-icon {
 background-position:-192px 0
}
.statmod-base .statmod-base-inner--iconkey-7-2 .statmod-base-icon {
 background-position:-192px -32px
}
.statmod-base .statmod-base-inner--iconkey-7-3 .statmod-base-icon {
 background-position:-192px -64px
}
.statmod-base .statmod-base-inner--iconkey-7-4 .statmod-base-icon {
 background-position:-192px -96px
}
.statmod-base .statmod-base-inner--iconkey-7-5 .statmod-base-icon {
 background-position:-192px -128px
}
.statmod-base .statmod-base-inner--iconkey-8-1 .statmod-base-icon {
 background-position:-224px 0
}
.statmod-base .statmod-base-inner--iconkey-8-2 .statmod-base-icon {
 background-position:-224px -32px
}
.statmod-base .statmod-base-inner--iconkey-8-3 .statmod-base-icon {
 background-position:-224px -64px
}
.statmod-base .statmod-base-inner--iconkey-8-4 .statmod-base-icon {
 background-position:-224px -96px
}
.statmod-base .statmod-base-inner--iconkey-8-5 .statmod-base-icon {
 background-position:-224px -128px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-1-2 .statmod-base-shape {
 background-position:0 -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-1-3 .statmod-base-shape {
 background-position:0 -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-1-4 .statmod-base-shape {
 background-position:0 -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-1-5 .statmod-base-shape {
 background-position:0 -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-2-1 .statmod-base-shape {
 background-position:-35px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-2-2 .statmod-base-shape {
 background-position:-35px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-2-3 .statmod-base-shape {
 background-position:-35px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-2-4 .statmod-base-shape {
 background-position:-35px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-2-5 .statmod-base-shape {
 background-position:-35px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-3-1 .statmod-base-shape {
 background-position:-70px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-3-2 .statmod-base-shape {
 background-position:-70px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-3-3 .statmod-base-shape {
 background-position:-70px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-3-4 .statmod-base-shape {
 background-position:-70px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-3-5 .statmod-base-shape {
 background-position:-70px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-4-1 .statmod-base-shape {
 background-position:-105px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-4-2 .statmod-base-shape {
 background-position:-105px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-4-3 .statmod-base-shape {
 background-position:-105px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-4-4 .statmod-base-shape {
 background-position:-105px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-4-5 .statmod-base-shape {
 background-position:-105px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-5-1 .statmod-base-shape {
 background-position:-140px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-5-2 .statmod-base-shape {
 background-position:-140px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-5-3 .statmod-base-shape {
 background-position:-140px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-5-4 .statmod-base-shape {
 background-position:-140px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-5-5 .statmod-base-shape {
 background-position:-140px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-6-1 .statmod-base-shape {
 background-position:-175px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-6-2 .statmod-base-shape {
 background-position:-175px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-6-3 .statmod-base-shape {
 background-position:-175px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-6-4 .statmod-base-shape {
 background-position:-175px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-1-6-5 .statmod-base-shape {
 background-position:-175px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-1-2 .statmod-base-shape {
 background-position:0 -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-1-3 .statmod-base-shape {
 background-position:0 -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-1-4 .statmod-base-shape {
 background-position:0 -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-1-5 .statmod-base-shape {
 background-position:0 -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-2-1 .statmod-base-shape {
 background-position:-35px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-2-2 .statmod-base-shape {
 background-position:-35px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-2-3 .statmod-base-shape {
 background-position:-35px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-2-4 .statmod-base-shape {
 background-position:-35px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-2-5 .statmod-base-shape {
 background-position:-35px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-3-1 .statmod-base-shape {
 background-position:-70px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-3-2 .statmod-base-shape {
 background-position:-70px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-3-3 .statmod-base-shape {
 background-position:-70px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-3-4 .statmod-base-shape {
 background-position:-70px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-3-5 .statmod-base-shape {
 background-position:-70px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-4-1 .statmod-base-shape {
 background-position:-105px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-4-2 .statmod-base-shape {
 background-position:-105px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-4-3 .statmod-base-shape {
 background-position:-105px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-4-4 .statmod-base-shape {
 background-position:-105px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-4-5 .statmod-base-shape {
 background-position:-105px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-5-1 .statmod-base-shape {
 background-position:-140px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-5-2 .statmod-base-shape {
 background-position:-140px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-5-3 .statmod-base-shape {
 background-position:-140px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-5-4 .statmod-base-shape {
 background-position:-140px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-5-5 .statmod-base-shape {
 background-position:-140px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-6-1 .statmod-base-shape {
 background-position:-175px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-6-2 .statmod-base-shape {
 background-position:-175px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-6-3 .statmod-base-shape {
 background-position:-175px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-6-4 .statmod-base-shape {
 background-position:-175px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-2-6-5 .statmod-base-shape {
 background-position:-175px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-1-2 .statmod-base-shape {
 background-position:0 -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-1-3 .statmod-base-shape {
 background-position:0 -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-1-4 .statmod-base-shape {
 background-position:0 -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-1-5 .statmod-base-shape {
 background-position:0 -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-2-1 .statmod-base-shape {
 background-position:-35px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-2-2 .statmod-base-shape {
 background-position:-35px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-2-3 .statmod-base-shape {
 background-position:-35px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-2-4 .statmod-base-shape {
 background-position:-35px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-2-5 .statmod-base-shape {
 background-position:-35px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-3-1 .statmod-base-shape {
 background-position:-70px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-3-2 .statmod-base-shape {
 background-position:-70px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-3-3 .statmod-base-shape {
 background-position:-70px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-3-4 .statmod-base-shape {
 background-position:-70px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-3-5 .statmod-base-shape {
 background-position:-70px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-4-1 .statmod-base-shape {
 background-position:-105px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-4-2 .statmod-base-shape {
 background-position:-105px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-4-3 .statmod-base-shape {
 background-position:-105px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-4-4 .statmod-base-shape {
 background-position:-105px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-4-5 .statmod-base-shape {
 background-position:-105px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-5-1 .statmod-base-shape {
 background-position:-140px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-5-2 .statmod-base-shape {
 background-position:-140px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-5-3 .statmod-base-shape {
 background-position:-140px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-5-4 .statmod-base-shape {
 background-position:-140px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-5-5 .statmod-base-shape {
 background-position:-140px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-6-1 .statmod-base-shape {
 background-position:-175px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-6-2 .statmod-base-shape {
 background-position:-175px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-6-3 .statmod-base-shape {
 background-position:-175px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-6-4 .statmod-base-shape {
 background-position:-175px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-3-6-5 .statmod-base-shape {
 background-position:-175px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-1-2 .statmod-base-shape {
 background-position:0 -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-1-3 .statmod-base-shape {
 background-position:0 -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-1-4 .statmod-base-shape {
 background-position:0 -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-1-5 .statmod-base-shape {
 background-position:0 -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-2-1 .statmod-base-shape {
 background-position:-35px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-2-2 .statmod-base-shape {
 background-position:-35px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-2-3 .statmod-base-shape {
 background-position:-35px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-2-4 .statmod-base-shape {
 background-position:-35px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-2-5 .statmod-base-shape {
 background-position:-35px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-3-1 .statmod-base-shape {
 background-position:-70px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-3-2 .statmod-base-shape {
 background-position:-70px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-3-3 .statmod-base-shape {
 background-position:-70px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-3-4 .statmod-base-shape {
 background-position:-70px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-3-5 .statmod-base-shape {
 background-position:-70px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-4-1 .statmod-base-shape {
 background-position:-105px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-4-2 .statmod-base-shape {
 background-position:-105px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-4-3 .statmod-base-shape {
 background-position:-105px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-4-4 .statmod-base-shape {
 background-position:-105px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-4-5 .statmod-base-shape {
 background-position:-105px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-5-1 .statmod-base-shape {
 background-position:-140px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-5-2 .statmod-base-shape {
 background-position:-140px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-5-3 .statmod-base-shape {
 background-position:-140px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-5-4 .statmod-base-shape {
 background-position:-140px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-5-5 .statmod-base-shape {
 background-position:-140px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-6-1 .statmod-base-shape {
 background-position:-175px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-6-2 .statmod-base-shape {
 background-position:-175px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-6-3 .statmod-base-shape {
 background-position:-175px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-6-4 .statmod-base-shape {
 background-position:-175px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-4-6-5 .statmod-base-shape {
 background-position:-175px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-1-1 .statmod-base-shape {
 background-position:0 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-1-2 .statmod-base-shape {
 background-position:0 -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-1-3 .statmod-base-shape {
 background-position:0 -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-1-4 .statmod-base-shape {
 background-position:0 -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-1-5 .statmod-base-shape {
 background-position:0 -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-2-1 .statmod-base-shape {
 background-position:-35px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-2-2 .statmod-base-shape {
 background-position:-35px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-2-3 .statmod-base-shape {
 background-position:-35px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-2-4 .statmod-base-shape {
 background-position:-35px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-2-5 .statmod-base-shape {
 background-position:-35px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-3-1 .statmod-base-shape {
 background-position:-70px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-3-2 .statmod-base-shape {
 background-position:-70px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-3-3 .statmod-base-shape {
 background-position:-70px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-3-4 .statmod-base-shape {
 background-position:-70px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-3-5 .statmod-base-shape {
 background-position:-70px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-4-1 .statmod-base-shape {
 background-position:-105px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-4-2 .statmod-base-shape {
 background-position:-105px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-4-3 .statmod-base-shape {
 background-position:-105px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-4-4 .statmod-base-shape {
 background-position:-105px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-4-5 .statmod-base-shape {
 background-position:-105px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-5-1 .statmod-base-shape {
 background-position:-140px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-5-2 .statmod-base-shape {
 background-position:-140px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-5-3 .statmod-base-shape {
 background-position:-140px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-5-4 .statmod-base-shape {
 background-position:-140px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-5-5 .statmod-base-shape {
 background-position:-140px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-6-1 .statmod-base-shape {
 background-position:-175px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-6-2 .statmod-base-shape {
 background-position:-175px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-6-3 .statmod-base-shape {
 background-position:-175px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-6-4 .statmod-base-shape {
 background-position:-175px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-5-6-5 .statmod-base-shape {
 background-position:-175px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-1-1 .statmod-base-shape {
 background-position:-210px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-1-2 .statmod-base-shape {
 background-position:-210px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-1-3 .statmod-base-shape {
 background-position:-210px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-1-4 .statmod-base-shape {
 background-position:-210px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-1-5 .statmod-base-shape {
 background-position:-210px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-2-1 .statmod-base-shape {
 background-position:-245px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-2-2 .statmod-base-shape {
 background-position:-245px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-2-3 .statmod-base-shape {
 background-position:-245px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-2-4 .statmod-base-shape {
 background-position:-245px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-2-5 .statmod-base-shape {
 background-position:-245px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-3-1 .statmod-base-shape {
 background-position:-280px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-3-2 .statmod-base-shape {
 background-position:-280px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-3-3 .statmod-base-shape {
 background-position:-280px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-3-4 .statmod-base-shape {
 background-position:-280px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-3-5 .statmod-base-shape {
 background-position:-280px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-4-1 .statmod-base-shape {
 background-position:-315px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-4-2 .statmod-base-shape {
 background-position:-315px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-4-3 .statmod-base-shape {
 background-position:-315px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-4-4 .statmod-base-shape {
 background-position:-315px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-4-5 .statmod-base-shape {
 background-position:-315px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-5-1 .statmod-base-shape {
 background-position:-350px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-5-2 .statmod-base-shape {
 background-position:-350px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-5-3 .statmod-base-shape {
 background-position:-350px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-5-4 .statmod-base-shape {
 background-position:-350px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-5-5 .statmod-base-shape {
 background-position:-350px -140px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-6-1 .statmod-base-shape {
 background-position:-385px 0
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-6-2 .statmod-base-shape {
 background-position:-385px -35px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-6-3 .statmod-base-shape {
 background-position:-385px -70px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-6-4 .statmod-base-shape {
 background-position:-385px -105px
}
.statmod-base--size-small .statmod-base-inner--shapekey-6-6-5 .statmod-base-shape {
 background-position:-385px -140px
}
.statmod-base--size-small .statmod-base-inner--iconkey-1-1 .statmod-base-icon {
 background-position:0 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-1-2 .statmod-base-icon {
 background-position:0 -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-1-3 .statmod-base-icon {
 background-position:0 -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-1-4 .statmod-base-icon {
 background-position:0 -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-1-5 .statmod-base-icon {
 background-position:0 -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-2-1 .statmod-base-icon {
 background-position:-12.4px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-2-2 .statmod-base-icon {
 background-position:-12.4px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-2-3 .statmod-base-icon {
 background-position:-12.4px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-2-4 .statmod-base-icon {
 background-position:-12.4px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-2-5 .statmod-base-icon {
 background-position:-12.4px -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-3-1 .statmod-base-icon {
 background-position:-24.8px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-3-2 .statmod-base-icon {
 background-position:-24.8px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-3-3 .statmod-base-icon {
 background-position:-24.8px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-3-4 .statmod-base-icon {
 background-position:-24.8px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-3-5 .statmod-base-icon {
 background-position:-24.8px -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-4-1 .statmod-base-icon {
 background-position:-37.2px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-4-2 .statmod-base-icon {
 background-position:-37.2px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-4-3 .statmod-base-icon {
 background-position:-37.2px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-4-4 .statmod-base-icon {
 background-position:-37.2px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-4-5 .statmod-base-icon {
 background-position:-37.2px -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-5-1 .statmod-base-icon {
 background-position:-49.6px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-5-2 .statmod-base-icon {
 background-position:-49.6px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-5-3 .statmod-base-icon {
 background-position:-49.6px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-5-4 .statmod-base-icon {
 background-position:-49.6px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-5-5 .statmod-base-icon {
 background-position:-49.6px -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-6-1 .statmod-base-icon {
 background-position:-62px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-6-2 .statmod-base-icon {
 background-position:-62px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-6-3 .statmod-base-icon {
 background-position:-62px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-6-4 .statmod-base-icon {
 background-position:-62px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-6-5 .statmod-base-icon {
 background-position:-62px -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-7-1 .statmod-base-icon {
 background-position:-74.4px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-7-2 .statmod-base-icon {
 background-position:-74.4px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-7-3 .statmod-base-icon {
 background-position:-74.4px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-7-4 .statmod-base-icon {
 background-position:-74.4px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-7-5 .statmod-base-icon {
 background-position:-74.4px -49.6px
}
.statmod-base--size-small .statmod-base-inner--iconkey-8-1 .statmod-base-icon {
 background-position:-86.8px 0
}
.statmod-base--size-small .statmod-base-inner--iconkey-8-2 .statmod-base-icon {
 background-position:-86.8px -12.4px
}
.statmod-base--size-small .statmod-base-inner--iconkey-8-3 .statmod-base-icon {
 background-position:-86.8px -24.8px
}
.statmod-base--size-small .statmod-base-inner--iconkey-8-4 .statmod-base-icon {
 background-position:-86.8px -37.2px
}
.statmod-base--size-small .statmod-base-inner--iconkey-8-5 .statmod-base-icon {
 background-position:-86.8px -49.6px
}
.statmod-base--size-small .statmod-base-icon {
 width:12.4px;
 height:12.4px;
 background-size:99.2px 62px
}
.statmod-base--size-small .statmod-base-shape {
 width:35px;
 height:35px;
 background-size:420px 175px
}
.statmod-img {
 width:87px;
 height:80px
}
.statmod-pips {
 display:block;
 background-color:#181615;
 margin:0 auto 4px;
 width:68px;
 padding:3px;
 line-height:0;
 border-radius:4px;
 box-shadow:0 0 0 1px #aaa
}
.statmod-pips:after,
.statmod-pips:before {
 display:table;
 content:"";
 clear:both
}
.statmod-pip {
 float:left;
 width:6px;
 height:6px;
 background-color:#fefce7;
 border-radius:50%;
 margin-right:3px
}
.statmod-pip:first-child {
 margin-left:1px
}
.statmod-pip:last-child {
 margin-right:1px
}
.loot-item .statmod {
 cursor:pointer;
 display:inline-block;
 vertical-align:top
}
.statmod .statmod-full {
 display:none
}
.statmod-slots img {
 width:34px;
 height:32px
}
.statmod-level {
 color:#fff;
 font-weight:700;
 background-color:#111;
 border-radius:1px;
 text-align:center;
 line-height:11px;
 box-shadow:0 0 0 1px #555
}
.statmod--max-level .statmod-level {
 color:#fc3
}
.popup-statmod {
 position:relative;
 max-width:250px;
 background-color:#fff;
 border-radius:7px;
 text-align:center;
 margin:0 auto
}
.popup-statmod .statmod-full .statmod-level {
 position:absolute;
 bottom:4px;
 right:0;
 padding:2px;
 width:23px
}
.popup-statmod .statmod-full .statmod-preview {
 position:relative;
 display:inline-block;
 vertical-align:top
}
.popup-statmod .statmod-title {
 padding:5px 10px;
 font-size:18px;
 font-weight:700;
 background-color:#425058;
 border-bottom:2px solid #99abb5;
 margin-bottom:15px;
 border-radius:5px 5px 0 0;
 color:#fff
}
.popup-statmod .statmod-details {
 border-top:1px solid #eaeaea;
 margin-top:15px;
 padding:15px 10px
}
.popup-statmod .statmod-set-heading,
.popup-statmod .statmod-stats-heading,
.popup-statmod .statmod-tier-heading {
 font-weight:700
}
.popup-statmod .statmod-slots-heading {
 font-weight:700;
 margin-bottom:5px
}
.popup-statmod .statmod-set,
.popup-statmod .statmod-stats,
.popup-statmod .statmod-tier {
 margin-bottom:10px
}
.popup-statmod .statmod-tier-values {
 width:69px;
 margin:0 auto;
 text-align:center;
 background-color:#333;
 border-radius:12px;
 border:1px solid #777;
 color:#fff;
 font-weight:700;
 padding:1px 0
}
.popup-statmod .statmod-tier-name {
 margin:0 5px;
 font-weight:700
}
.popup-statmod .statmod-stat-label {
 margin-left:5px
}
.pc-statmod-list {
 position:relative;
 width:108px;
 height:186px;
 background:top transparent url(https://swgoh.gg/static/img/ui/statmod-bg.png) no-repeat;
 background-size:contain
}
.pc-statmod-list .pc-statmod {
 position:absolute;
 cursor:pointer;
 z-index:15
}
.pc-statmod-list .pc-statmod-slot1 {
 left:14%;
 top:7%
}
.pc-statmod-list .pc-statmod-slot1 .statmod-summary .statmod-level {
 left:-16px;
 top:10px
}
.pc-statmod-list .pc-statmod-slot2 {
 left:57%;
 top:4%
}
.pc-statmod-list .pc-statmod-slot2 .statmod-summary .statmod-level {
 left:7px;
 top:39px
}
.pc-statmod-list .pc-statmod-slot3 {
 left:20.5%;
 top:45%
}
.pc-statmod-list .pc-statmod-slot3 .statmod-summary .statmod-level {
 left:18px;
 top:40px
}
.pc-statmod-list .pc-statmod-slot4 {
 left:52%;
 top:37%
}
.pc-statmod-list .pc-statmod-slot4 .statmod-summary .statmod-level {
 left:31px;
 top:22px
}
.pc-statmod-list .pc-statmod-slot5 {
 left:20%;
 top:74%
}
.pc-statmod-list .pc-statmod-slot5 .statmod-summary .statmod-level {
 left:-11px;
 top:10px
}
.pc-statmod-list .pc-statmod-slot6 {
 left:57%;
 top:65%
}
.pc-statmod-list .pc-statmod-slot6 .statmod-summary .statmod-level {
 left:-5px;
 top:38px
}
.pc-statmod-list-line,
.pc-statmod-list-set {
 position:absolute;
 background:0 0 transparent url(https://swgoh.gg/static/img/ui/statmod-shapes.png) no-repeat;
 background-size:161px
}
.pc-statmod-list-set-1 {
 left:28px;
 top:59px;
 width:28px;
 height:24px;
 z-index:10
}
.pc-statmod-list-set-1-max {
 background-position:-110px 0
}
.pc-statmod-list-set-1-complete {
 background-position:-135px 0
}
.pc-statmod-list-set-2 {
 left:32px;
 top:62px;
 width:21px;
 height:21px;
 z-index:9
}
.pc-statmod-list-set-2-max {
 background-position:-112px -26px;
 left:33px
}
.pc-statmod-list-set-2-complete {
 background-position:-137px -26px
}
.pc-statmod-list-set-3 {
 left:34px;
 top:63px;
 width:14px;
 height:14px;
 z-index:8
}
.pc-statmod-list-set-3-max {
 background-position:-111px -46px
}
.pc-statmod-list-set-3-complete {
 background-position:-136px -45px
}
.pc-statmod-list-line {
 z-index:5
}
.pc-statmod-list-line-1 {
 left:8px;
 top:33px;
 width:30px;
 height:30px
}
.pc-statmod-list-line-1-max {
 background-position:0 0
}
.pc-statmod-list-line-1-complete {
 background-position:-56px 0
}
.pc-statmod-list-line-2 {
 left:46px;
 top:46px;
 width:27px;
 height:16px
}
.pc-statmod-list-line-2-max {
 background-position:0 -31px
}
.pc-statmod-list-line-2-complete {
 background-position:-56px -31px
}
.pc-statmod-list-line-3 {
 left:16px;
 top:68px;
 width:30px;
 height:68px
}
.pc-statmod-list-line-3-max {
 background-position:0 -46px
}
.pc-statmod-list-line-3-complete {
 background-position:-56px -46px
}
.pc-statmod-list-line-4 {
 left:51px;
 top:60px;
 width:50px;
 height:35px
}
.pc-statmod-list-line-4-max {
 background-position:0 -114px
}
.pc-statmod-list-line-4-complete {
 background-position:-56px -114px
}
.pc-statmod-list-line-5 {
 left:12px;
 top:65px;
 width:27px;
 height:86px
}
.pc-statmod-list-line-5-max {
 background-position:0 -149px
}
.pc-statmod-list-line-5-complete {
 background-position:-56px -149px
}
.pc-statmod-list-line-6 {
 left:51px;
 top:57px;
 width:56px;
 height:111px
}
.pc-statmod-list-line-6-max {
 background-position:0 -234px
}
.pc-statmod-list-line-6-complete {
 background-position:-56px -234px
}
.pc-statmod-list .statmod-summary .statmod-level {
 position:absolute;
 font-size:10px;
 width:16px
}
.pc-statmod-list .statmod-pips {
 box-shadow:0 0 0 1px #181615
}

/* custom */
.pc-statmods--small .statmod-base {
	margin: 3px 0px;
}
.pc-statmods--small {
	display: inline-block;
	width: unset;
	height: unset;
	padding: 0px;
	text-align: center;
}
.pc-skill {
 width:66px;
 display:inline-block;
 vertical-align: top;
}
.pc-skill-ability {
	white-space: nowrap; /* datatables sets this automatically. If I want multiline, set it to normal */
	text-overflow: ellipsis;
	overflow: hidden;
}
.pc-skill-name {
 text-align:left;
}
.pc-skill-progress {
	color:orangered;
	font-weight: bold;
}
.pc-skill-progress--max {
 color:green;
}
.pc-skill__material {
 top:0px;
 right:0px;
 background:none;
 border:none;
}

/* custom */


</style>

<link rel="stylesheet" href="{{ asset('sprites/gear--micro.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/gear--small.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/gear.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('sprites/gear--medium.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('sprites/gear--large.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{ asset('sprites/gear--orig.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('sprites/chars--micro.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/chars--small.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/chars.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/ships--micro.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/ships--small.css') }}">
<link rel="stylesheet" href="{{ asset('sprites/ships.css') }}">

@endpush
