// モーダルを表示し、ビデオを再生する
function showModal() {
    console.log("Hi i am showModal clicked ");
    document.getElementById("modal-bg").classList.remove("NoDisplayModal");
    document.getElementById("modal-container").classList.remove("NoDisplayModal");
    document.getElementById("hide-item").classList.add("hide-element");
    document.getElementById('myVideo').play();
}


// モーダルを非表示にし、ビデオを一時停止する
function NoShowModal() {
    // console.log("hi i am NoShowModal function  ");
    document.getElementById("modal-bg").classList.add("NoDisplayModal");
    document.getElementById("modal-container").classList.add("NoDisplayModal");
    // https://developer.mozilla.org/en-US/docs/Web/API/HTMLMediaElement/pause
    // document.getElementsByTagName('video')[0].pause()
    document.getElementById('myVideo').pause()
}


// nav-items Active---------------------------------------------------

document.addEventListener('DOMContentLoaded', // DOMの内容がすべて読み込まれたらmenu_options関数を実行
    function () {
        const navItems = document.querySelectorAll('.nav-item'); // .nav-itemクラスを持つすべての要素を取得

        // 各要素にクリックイベントリスナーを追加
        navItems.forEach(item => {
            item.addEventListener('click', function () {

                navItems.forEach(navItem => {
                    navItem.classList.remove('active')
                });  // すべての.nav-item要素から'active'クラスを削除

                this.classList.add('active'); // クリックされたアイテムに'active'クラスを追加
            });
        });
    });

// ----------------------------------------------------------------
// ユーザーが [li] をクリックすると、アイテムがリロードされます
// https://digitalfox-tutorials.com/tutorial.php?title=Send-HTTP-GET-Request-Using-the-Fetch-API
let seek;

function seekItem(event) {
    clearMenuItems();
    seek = event.target.id
    console.log(seek);
    showData(seek);
    closeNav();

}

function showData(seek) {
    let count = 0;
    let text = ``;
    // PHPファイルからデータを取得する
    //クエリ文字列を付けてGETリクエストを送信することもできます。
    fetch("../data.php?category=" + seek)
        // .then()や.catch()を使って、処理の成功や失敗を簡単に扱えます。
        .then(response => response.json())  // レスポンスをJSON形式に変換
        .then(data => {
            console.log(data);
            data.forEach((item) => {
                count += 1;
                text += htmlTags(item); // htmlTags でHTMLを生成

                

            });
            text += `</div>`;
            document.getElementById("MyMenuItems").innerHTML = text;

        })
        .catch(error => console.error("Fetchエラー:", error));
}

function htmlTags(item) {
    return ` <div class="col">
                <div class="menu-items  ">
                                <img src="../templates/food-imgs/${item.imagen}"
                                    alt="Twin cannoli" class="photo">
                                <div class="menu-info">
                                    <div class="menu-title">
                                        <h4>${item.name}</h4>
                                        <span class="price">$${item.price}</span>
                                    </div>
                                    <div class="menu-text">${item.description}
                                    </div>
                                </div>
                                </div>
                            </div>`;
    // console.log(text);

}

function clearMenuItems() {
    document.getElementById("MyMenuItems").innerHTML = "";
}

// ページが読み込まれると、メニュー内の「All</li>」の項目が自動的に表示されます。
document.addEventListener('DOMContentLoaded', function () {
    seek = "'*'";
    console.log(seek);
    showData(seek);
});

// OPEN AND CLOSE MENU FOR SMALL SCREENS
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}



