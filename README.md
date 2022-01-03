# line-sail

[![IMAGE ALT TEXT HERE](thumbnailImage.png)](https://youtu.be/0sLqy5UFSpA)

* 制作期間: 2021年10月~　11月　30日間
* 使用技術: Laravel,BootStrap,Jquery,Html,CSS
* 使用API: LineメッセージAPI(Liff)
* プロダクト紹介映像：
https://youtu.be/0sLqy5UFSpA

### 概要
中小企業向けにLineを使用した顧客へのメッセージングツールを作成しました。Line-sail上から登録した顧客へのメッセージ送信機能、フレンドの登録機能等を実装しています。

### 利用環境/再現手順
* firebasejs 8.0で製作したため、最新のfirebase環境では動作をしない可能性が高いです。　[register.html](https://github.com/worldwideweb13/Tecmon/blob/964ab9d44a910598bf5044aefaebd1712053673f/register.html) の23行目付近からFireBase(realtimeDB)への接続を行っています。コメントアウトの記述" //Your web app's Firebase configuration" 以下の部分からはご自身のfirebase利用環境の設定を書き込んで下さい。
* データベースはrealtimeデータベースを利用しています。[tecmon-RealtimeDatabase-export.json](https://github.com/worldwideweb13/Tecmon/blob/964ab9d44a910598bf5044aefaebd1712053673f/tecmon-RealtimeDatabase-export.json)　にゲームデータをjson形式で記載しておりますのでこのファイルを　realtimedatabaseにアップロードして下さい。
* FireBaseの設定を済ませ、[register.html](register.html)をブラウザで立ち上げれば、アプリは動作します。
* VsCode推奨。拡張機能でLiveServerをインストール。[LiveServer](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)経由でindex.htmlをブラウザで開くとアプリが動作します。
* [index.html](https://github.com/worldwideweb13/Tecmon/blob/106b97e0da5932f9f59b4c0ec6a3f0c7f43e6a79/index.html) のコメントアウトの記述" //Your web app's Firebase configuration" 以下の部分からはご自身のfirebase利用環境の設定を書き込んで下さい。

 
### 開発の苦労した点
ゲーム内のキャラクターモーションは全てゼロから実装したため、コードが肥大化し１ファイル１０００行近くコードを書くことになりました。。開発期間を1週間に区切ったため、ゲームを完成させるためにひたすらコードを書きまくりました。開発の途中でDB構造の欠陥にあたり、DBの再構築、影響箇所の再度修正を迫られたり、コードが肥大化した結果、エラーハンドリングが誰にも聞けない状態になり最後の方は修正作業にも数時間を費やす羽目になったりと、、アプリ開発の辛みを味わいました。しかし、これらの経験を通じて、DB、バック、フロントエンド開発といった基礎概念を身体で理解できた感覚を持てるようになり、以降からは自分の作りたいアプリを形にするアルゴリズムを体感的に描けるようになりました。
本アプリの制作を通じ、コードを書けるようになる成長実感を掴めました。


