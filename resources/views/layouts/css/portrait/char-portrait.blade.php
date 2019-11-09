.char-portrait {
    background-color: #000;
    border-radius: 50px;
    position: relative;
    display: inline-block;
    vertical-align: top;
}
.char-portrait-dark-side .char-portrait-image {
    border-color: #b03233;
    box-shadow: inset 0 0 3px 2px rgba(176, 50, 51, 0.8);
}
.char-portrait-light-side .char-portrait-image {
    border-color: #3f8cba;
    box-shadow: inset 0 0 3px 2px rgba(63, 140, 186, 0.8);
}
.char-portrait-micro {
    border-width: 2px;
}
.char-portrait-micro .char-portrait-image,
.char-portrait-micro .char-portrait-img {
    width: 30px;
    height: 30px;
}
.char-portrait-xsmall {
    border-width: 2px;
}
.char-portrait-xsmall .char-portrait-image,
.char-portrait-xsmall .char-portrait-img {
    width: 40px;
    height: 40px;
}
.char-portrait-small {
    border-width: 2px;
}
.char-portrait-small .char-portrait-image,
.char-portrait-small .char-portrait-img {
    width: 50px;
    height: 50px;
}
.char-portrait-medium .char-portrait-image,
.char-portrait-medium .char-portrait-img {
    width: 64px;
    height: 64px;
}
.char-portrait-large .char-portrait-image,
.char-portrait-large .char-portrait-img {
    width: 100px;
    height: 100px;
}
.char-portrait-image {
    display: inline-flex;
    vertical-align: top;
    position: relative;
    overflow: hidden;
    width: 84px;
    height: 84px;
    border-radius: 50%;
    border: 3px solid #333;
    background-color: #000;
    box-shadow: inset 0 0 3px 2px rgba(0, 0, 0, 0.8);
}
.char-portrait-img {
    width: 84px;
    height: 84px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    background-color: #111;
}
.char-portrait-gear-ready {
    position: absolute;
    background-color: #32cd32;
    width: 14px;
    height: 14px;
    right: 0;
    top: -1px;
    z-index: 10;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.8);
}
.char-portrait-full {
    position: relative;
    width: 84px;
    height: 84px;
    background-color: #000;
    box-shadow: 0 0 0 2px #555;
    border-radius: 50%;
}
.char-portrait-full-centered {
    margin: 0 auto;
}
.char-portrait-full-micro,
.char-portrait-full-micro .char-portrait-full-gear,
.char-portrait-full-micro .char-portrait-full-img {
    width: 35px;
    height: 35px;
}
.char-portrait-full-micro .char-portrait-full-level {
    font-size: 8px;
    padding: 0 3px;
    border-radius: 100%/130% 130% 9px 9px;
    border-width: 1px;
    width: auto;
}
.char-portrait-full-micro .star {
    width: 7px;
    height: 26px;
}
.char-portrait-full-small,
.char-portrait-full-small .char-portrait-full-gear,
.char-portrait-full-small .char-portrait-full-img {
    width: 50px;
    height: 50px;
}
.char-portrait-full-small .char-portrait-full-level {
    font-size: 11px;
    width: 25px;
    padding: 0;
}
.char-portrait-full-small .star {
    width: 11px;
    height: 38px;
}
.char-portrait-full-large,
.char-portrait-full-large .char-portrait-full-gear,
.char-portrait-full-large .char-portrait-full-img {
    width: 100px;
    height: 100px;
}
.char-portrait-full-large .star {
    width: 19px;
    height: 69px;
}
.char-portrait-full-large .char-portrait-full-level {
    font-size: 16px;
    width: 35px;
}
.char-portrait-full-large .char-portrait-full-gear-level {
    font-size: 14px;
    width: 30px;
    left: 78%;
}
.char-portrait-full-full-link {
    display: block;
}
.char-portrait-full-empty {
    background-color: #ccc;
    box-shadow: 0 0 0 2px #aaa;
}
.char-portrait-full-img {
    width: 84px;
    height: 84px;
    border-radius: 50%;
    background-color: #000;
}
.char-portrait-full-gear {
    position: absolute;
    width: 84px;
    height: 84px;
    z-index: 2;
    top: 0;
    left: 0;
}
.char-portrait-full-gear-t1 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g1.svg') }});
}
.char-portrait-full-gear-t2 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g2.svg') }});
}
.char-portrait-full-gear-t3 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g3.svg') }});
}
.char-portrait-full-gear-t4 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g4.svg') }});
}
.char-portrait-full-gear-t5 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g5.svg') }});
}
.char-portrait-full-gear-t6 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g6.svg') }});
}
.char-portrait-full-gear-t7 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g7.svg') }});
}
.char-portrait-full-gear-t8 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g8.svg') }});
}
.char-portrait-full-gear-t9 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g9.svg') }});
}
.char-portrait-full-gear-t10 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g10.svg') }});
}
.char-portrait-full-gear-t11 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g11.svg') }});
}
.char-portrait-full-gear-t12 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/gear-icon-g12.svg') }});
}
.char-portrait-full-gear-t13 .char-portrait-full-gear {
    background-image: url({{ asset('images/assets/g13-frame-atlas.png') }});
    width: 105px;
    height: 98px;
    background-size: 100%;
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.char-portrait-full-gear-t13.char-portrait-full-micro .char-portrait-full-gear {
    width: 45px;
    height: 42px;
}
.char-portrait-full-gear-t13.char-portrait-full-small .char-portrait-full-gear {
    width: 64px;
    height: 60px;
}
.char-portrait-full-gear-t13.char-portrait-full-large .char-portrait-full-gear {
    width: 130px;
    height: 121px;
}
.char-portrait-full-gear-t13.char-portrait-full-alignment-dark-side
    .char-portrait-full-gear {
    background-position: 0 -100%;
}
.char-portrait-full-gear-t13.char-portrait-full-alignment-neutral
    .char-portrait-full-gear {
    background-position: 0 -200%;
}
.char-portrait-full-gear-level,
.char-portrait-full-level {
    position: absolute;
    -webkit-transform: translate(-50%);
    transform: translate(-50%);
    color: #fff;
    font-weight: 700;
    background-color: #264257;
    border: 2px solid #fff;
    text-align: center;
    border-radius: 100%/130% 130% 15px 15px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    text-shadow: -1px -1px 0 #000, 2px -1px 0 #000, 2px 2px 0 #000,
        -1px 2px 0 #000, 2px 3px 0 #000, 1px 3px 0 #000, 2px 3px 0 #000;
}
.char-portrait-full-level {
    position: absolute;
    bottom: -5px;
    left: 50%;
    z-index: 4;
    width: 30px;
    padding: 0 5px;
}
.char-portrait-full-gear-level {
    left: 80%;
    bottom: 0;
    font-size: 12px;
    min-width: 26px;
    padding: 0 6px 0 5px;
    z-index: 2;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5),
        inset 0 0 8px 1px rgba(0, 0, 0, 0.5);
}
.char-portrait-full-zeta {
    background: 50% transparent
        url({{ asset('images/assets/tex.skill_zeta_glow.png') }})
        no-repeat;
    background-size: contain;
    width: 50px;
    height: 40px;
    top: 48px;
    left: -17px;
    line-height: 40px;
    text-shadow: -1px -1px 0 #7028c9, 2px -1px 0 #7028c9, 2px 2px 0 #7028c9,
        -1px 2px 0 #7028c9, 2px 3px 0 #7028c9, 1px 3px 0 #7028c9,
        2px 3px 0 #7028c9;
}
.char-portrait-full-relic,
.char-portrait-full-zeta {
    position: absolute;
    z-index: 4;
    color: #fff;
    text-align: center;
    font-size: 13px;
    font-weight: 700;
}
.char-portrait-full-relic {
    background-image: url({{ asset('images/assets/relic-badge-atlas.png') }});
    background-size: 100%;
    width: 44px;
    height: 44px;
    top: 44px;
    right: -13px;
    line-height: 43px;
    text-shadow: -1px -1px 0 #000, 2px -1px 0 #000, 2px 2px 0 #000,
        -1px 2px 0 #000, 2px 3px 0 #000, 1px 3px 0 #000, 2px 3px 0 #000;
}
.char-portrait-full-gear-t13.char-portrait-full-alignment-dark-side
    .char-portrait-full-relic {
    background-position: 0 -100%;
}
.char-portrait-full-gear-t13.char-portrait-full-alignment-neutral
    .char-portrait-full-relic {
    background-position: 0 -200%;
}
.char-portrait-full-large .char-portrait-full-zeta {
    left: -19px;
    top: 60px;
    width: 55px;
    height: 46px;
    line-height: 46px;
}
.char-portrait-full-large .char-portrait-full-relic {
    top: 57px;
    right: -11px;
    width: 50px;
    height: 50px;
    line-height: 50px;
}
.char-portrait-full-gear-t1 .char-portrait-full-gear-level {
    background-color: #a5d0da;
}
.char-portrait-full-gear-t2 .char-portrait-full-gear-level,
.char-portrait-full-gear-t3 .char-portrait-full-gear-level {
    background-color: #98fd33;
}
.char-portrait-full-gear-t4 .char-portrait-full-gear-level,
.char-portrait-full-gear-t5 .char-portrait-full-gear-level,
.char-portrait-full-gear-t6 .char-portrait-full-gear-level {
    background-color: #00bdfe;
}
.char-portrait-full-gear-t7 .char-portrait-full-gear-level,
.char-portrait-full-gear-t8 .char-portrait-full-gear-level,
.char-portrait-full-gear-t9 .char-portrait-full-gear-level,
.char-portrait-full-gear-t10 .char-portrait-full-gear-level,
.char-portrait-full-gear-t11 .char-portrait-full-gear-level {
    background-color: #9241ff;
}
.char-portrait-full-gear-t12 .char-portrait-full-gear-level {
    background-color: #fc3;
}
.char-portrait-full-gear-t13 .char-portrait-full-gear-level {
    background-color: #f56820;
}
