const menuItems = [
    {
        id: 1,
        name: "ステーキ",
        category: "main",
        rice: 1500,
        description: "ジューシーなビーフステーキ"
    },
    {
        id: 2,
        name: "ケーキ",
        category: "dessert",
        price: 600,
        sescription: "フワフワのチョコレートケーキ"
    },
    {
        id: 3,
        name: "コーヒー",
        category: "drinks",
        price: 300,
        escription: "アロマ香るホットコーヒー"
    },
    {
        id: 4,
        name: "寿司",
        category: "main",
        rice: 1200,
        description: "新鮮なネタの握り寿司"
    },
    {
        id: 5,
        name: "アイスクリーム",
        category: "dessert",
        rice: 500,
        description: "滑らかなバニラアイスクリーム"
    },
];


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


// nav-items------------------------------------

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
// https://digitalfox-tutorials.com/tutorial.php?title=Send-HTTP-GET-Request-Using-the-Fetch-API
document.addEventListener("DOMContentLoaded", showData);

function showData() {
    // PHPファイルからデータを取得する
    fetch("../data.php?category=main")
        .then(response => response.json())  // レスポンスをJSON形式に変換
        .then(data => console.log(data))    // データをコンソールに表示
        .catch(error => console.error("Fetchエラー:", error));  // エラー処理

    // 2.特定のデータを取得するために、クエリ文字列を付けてGETリクエストを送信することもできます。
}

  






