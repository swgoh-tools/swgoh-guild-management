@push('styles')
<style>
    .help {
        position: relative;
        display: inline-block;
        margin-left: 3px;
    }

    .help i div {
        position: absolute;
        display: inline-block;
        visibility: hidden;
        /* background-color: #7bc8fd; */
        /* box-shadow: 0 0 0 2px #555; */
        /* border-radius: 5px; */
        /* text-align: center; */
        /* border: 1px solid #777; */
        padding: 10px;
        font-size: large;
        top: -10px;
        left: 20px;
        width: 255px;
        z-index: 999;
    }

    .help:hover i div {
        visibility: visible;
    }

</style>
@endpush
