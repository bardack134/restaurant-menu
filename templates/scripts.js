// ステップ2. モーダルを表示
function showModal() {
    // (#modal-bg) と (#modal-container) idで NoDisplayModal のクラスを削除します。
    console.log("Hi i am showModal clicked ");
    document.getElementById("modal-bg").classList.remove("NoDisplayModal");
    document.getElementById("modal-container").classList.remove("NoDisplayModal");
    document.getElementById("hide-item").classList.add("hide-element");
    document.getElementById('myVideo').play(); // ビデオの再生が自動的に始まります
}

// ステップ 3: ユーザーが閉じるアイコンをクリックすると、 NoShowModal() 関数が実行されます。
function NoShowModal() {
    // NoDisplayModal クラスを追加します。 これにより、モーダルが非表示になります。
    document.getElementById("modal-bg").classList.add("NoDisplayModal");
    document.getElementById("modal-container").classList.add("NoDisplayModal");
    // NOTE: https://developer.mozilla.org/en-US/docs/Web/API/HTMLMediaElement/pause
    document.getElementById('myVideo').pause()
}


// ---------------------------------------------------
// c. id='menu'　＝＞ステップ ２：JavaScriptの実行

document.addEventListener('DOMContentLoaded', // DOMの内容がすべて読み込まれたらmenu_options関数を実行
    function () {
        // .nav-itemクラスを持つすべての要素を取得
        const navItems = document.querySelectorAll('.nav-item');

        // 各要素にクリックイベントリスナーを追加
        navItems.forEach(item => {
            item.addEventListener('click', function () {

                // クリック時 -> すべての.nav-item要素から'active'クラスを削除 ->
                navItems.forEach(navItem => {
                    navItem.classList.remove('active');
                });

                // -> クリックされたアイテムに'active'クラスを追加
                this.classList.add('active');
            });
        });
    });

// SHOW MENU BY CATEGORY-------------------------------------------------------
// ユーザーが [li] をクリックすると、アイテムがリロードされます
// https://digitalfox-tutorials.com/tutorial.php?title=Send-HTTP-GET-Request-Using-the-Fetch-API
let seek;

function seekItem(event) {
    seek = event.target.id
    if (seek == "'*'") {
        document.getElementById("category").innerHTML = "all";
    } else {
        document.getElementById("category").innerHTML = seek;

    }
    clearMenuItems();
    console.log(seek);
    showData(seek);
    closeNav();

}

/* https://digitalfox-tutorials.com/tutorial.php?title=Send-HTTP-GET-Request-Using-the-Fetch-API
 * Fetch API は、JavaScript でサーバーとデータのやり取りをするための機能です。
 * 主にウェブページから情報を取得したり、データを送信したりするために使います。
 */

function showData(seek) {
    let count = 0;
    let text = ``;

    // data.phpファイルからデータを取得する
    //クエリ文字列を付けてGETリクエストを送信することもできます。
    fetch("../data.php?category=" + seek)
        // .then()や.catch()を使って、処理の成功や失敗を簡単に扱えます。
        .then(response => response.json())  //3. サーバーからのレスポンスをJSON形式に変換します。
        .then(data => {
            console.log(data); //3. data正しく取得した、確認するだけでした

            //3. forEach() を使って、取得したデータ（アイテム情報）を1つずつ処理します
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

// ----------CHECK RESERVATIONS----------------------------------------
function openNav_up_down() {
    document.getElementById("myNav_up_down").style.height = "100%";
}
function closeNav_up_down() {
    document.getElementById("myNav_up_down").style.height = "0%";
}

function fetchReservation() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;

    if (name == "" || email == "") {
        document.getElementById('warning').innerHTML = "すべてのフィールドに記入してください";
    } else {
        document.getElementById('warning').innerHTML = "";
        fetch(`fetch_reservation.php?name=${name}&email=${email}`)
            .then(response => response.json())
            .then(data => {
                var resultDiv = document.getElementById('result');
                if (data) {
                    console.log(data);
                    resultDiv.innerHTML = `
                    <p class='gold-text'>Name:<span style='color:#FFF0DC'>${data.Name}</span></p>
                    <p class='gold-text'>Email:<span style='color:#FFF0DC'>${data.Email}</span></p>
                    <p class='gold-text'>Phone:<span style='color:#FFF0DC'>${data.Phone}</span></p>
                    <p class='gold-text'>Date:<span style='color:#FFF0DC'>${data.Date}</span></p>
                    <p class='gold-text'>Number of People:<span style='color:#FFF0DC'>${data.NumberOfPeople}</span></p>
                    <p class='gold-text'>Message:<span style='color:#FFF0DC'>${data.Message}</span></p>
                `;
                } else {
                    resultDiv.innerHTML = "<p>該当する予約情報が見つかりませんでした。</p>";
                }
            })
            .catch(error => console.error("Fetchエラー:", error));

        return false; // フォームのデフォルトの送信をキャンセル
    }
}



