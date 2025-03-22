<div class="popup-overlay" style="display: none;">
    <div class="popup-box">
        <button class="popup-close">X</button>
        <div class="popup-content">
            <h2></h2>
            <div class="popup-body"></div>
        </div>
    </div>
</div>

<style>
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
}
.popup-box {
    background: white;
    padding: 20px;
    width: 50%;
    position: relative;
    border-radius: 10px;
}
.popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    background: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}
</style>
