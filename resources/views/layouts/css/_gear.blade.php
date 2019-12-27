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
 background:url({{ asset('images/assets/gear-atlas.png') }}) no-repeat;
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

@include('layouts.css.portrait.stars')

@include('layouts.css.portrait.character')

@include('layouts.css.portrait.char-portrait')


/* break */


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
 background:url({{ asset('images/assets/gear-atlas.png') }}) no-repeat;
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
 background:0 0 transparent url({{ asset('images/assets/mod-icon-atlas.png') }}) no-repeat;
 position:absolute
}
.stat-mod-icon-shape__shape {
 width:90px;
 height:90px;
 background:0 0 transparent url({{ asset('images/assets/mod-shape-atlas.png') }}) no-repeat
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
 background-image:url({{ asset('images/assets/sort-asc.png') }})
}
.dataTables_wrapper .row .dataTable thead th.sorting_desc {
 background-image:url({{ asset('images/assets/sort-desc.png') }})
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

@include('layouts.css.portrait.statmod')

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
 width:75px;
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

.char-portrait-full-micro {
 display:inline-block;
 margin:3px 9px 3px 0
}
.char-portrait-full-small {
 display:inline-block;
 margin:13px 8px 0 8px
}
.char-portrait-full {
 display:inline-block;
 margin:3px 27px 3px 0
}

.char-portrait-full-small .char-portrait-full-zeta, .char-portrait-full-small .char-portrait-full-relic {
	line-height: 22px;
	top: 60%;
	height: 22px;
    width: 22px;
	background-size: 22px;
	font-weight: normal;
	font-size: 8px;
}

.char-portrait-full-small .char-portrait-full-zeta {
	left: -10px;
}

.char-portrait-full-small .char-portrait-full-relic {
	right: -10px;
}

.char-portrait-full-micro .char-portrait-full-zeta, .char-portrait-full-micro .char-portrait-full-relic {
	line-height: 20px;
	bottom: 0px;
	height: 20px;
	width: 20px;
	background-size: 20px;
	font-weight: normal;
	font-size: 8px;
	top: unset;
}

.char-portrait-full-micro .char-portrait-full-zeta {
	left: -10px;
}

.char-portrait-full-micro .char-portrait-full-relic {
	right: -10px;
}


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
