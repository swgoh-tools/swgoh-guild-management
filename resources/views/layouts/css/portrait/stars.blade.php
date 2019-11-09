.star {
    position: absolute;
    bottom: 50%;
    left: 50%;
    width: 15px;
    height: 55px;
    color: #000;
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    background: center 0 transparent url({{ asset('images/assets/star.png') }})
        no-repeat;
    background-size: 100%;
}
.star-inactive {
    background-image: url({{ asset('images/assets/star-inactive.png') }});
}
.star1 {
    -webkit-transform: translateX(-50%) rotate(-60deg);
    transform: translateX(-50%) rotate(-60deg);
}
.star2 {
    -webkit-transform: translateX(-50%) rotate(-40deg);
    transform: translateX(-50%) rotate(-40deg);
}
.star3 {
    -webkit-transform: translateX(-50%) rotate(-20deg);
    transform: translateX(-50%) rotate(-20deg);
}
.star4 {
    -webkit-transform: translateX(-50%) rotate(0deg);
    transform: translateX(-50%) rotate(0deg);
}
.star5 {
    -webkit-transform: translateX(-50%) rotate(20deg);
    transform: translateX(-50%) rotate(20deg);
}
.star6 {
    -webkit-transform: translateX(-50%) rotate(40deg);
    transform: translateX(-50%) rotate(40deg);
}
.star7 {
    -webkit-transform: translateX(-50%) rotate(60deg);
    transform: translateX(-50%) rotate(60deg);
}
.character-image .star {
    height: 55px;
}
