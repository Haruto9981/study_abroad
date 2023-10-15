

<h1 align="center">Abroad＋</h1>

<div align="center">
    <a href="https://www.abroad-plus.com"><img src="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1694504297/iyfnp36solrghvygndv8.jpg"></a>
</div>

アプリURL:https://www.abroad-plus.com

## 制作背景

留学SNSアプリ（Abroad+）を制作しました。このアプリは私が去年経験したイギリス留学が制作背景となりました。「留学あるある？」かもしれませんが、留学中は毎日が刺激的なので、モチベーション維持や英作文の練習も兼ねて日記のような形で毎日を記録する人が多いです。私自身、Instagramを使って、その日起こった出来事や学んだ英語表現などを英語で発信していましたし、私の周りの友達もそのような人が多かったです。そこで今回、留学や英語関連だけの専用のSNSプラットフォームを作りたいと考えてこのアプリを作りました。

## アプリ概要
「留学に関わるすべての人に」

本アプリのメインターゲットは現在留学している人だけでなく、留学を予定している人、留学を考えている人です。

現在留学中の人は同じように留学している人同士で繋がり、英語日記や学んだ英語表現を共有することでモチベーションを維持したり、自身の英語学習に役立てたりすることができます。

留学を予定している人も今留学中の人の投稿を見ることで留学前からモチベーションが高い状態で学習することに繋がるでしょう。

どの国へ留学に行くか迷っているような人は一つ一つの投稿がそれを決める上で大きな参考になると思います。

「すべての留学が実りあるものになるように」そんな思いを込めて制作しています。

## 開発環境
<b>使用言語：</b>
- PHP
- HTML
- CSS (Tailwind CSS)
- JavaScript

<b>環境：</b>
- Laravel (ver.9)
- AWS (EC2＋Cloud9)
- MySQL (MariaDB)
- GitHub
- Cloudinary

<b>デプロイ：</b>
- Heroku

## データフロー
<img src="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696147997/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88_2023-10-01_17.07.01_g6bu8s.png" width="225">

## 機能

- 英語日記投稿（表示、詳細、投稿、編集、削除）
- 英語表現投稿（表示、詳細、投稿、編集、削除）
- カウントダウン (留学開始/終了まで残り〇〇日)
- カレンダー (Fullcalendar)
- 留学先Map表示機能 (Google Maps API)
- ログイン
- プロフィール
- いいね
- フォロー
- コメント

## こだわり・工夫した点

<b>カウントダウン機能：</b>
ユーザーのモチベーションにつながるようにと実装しました。本アプリでは新規登録時に留学開始日と留学終了日を設定するのですが、留学前であれば、留学開始まで残り何日かをカウントダウン、留学中であれば、留学終了まで何日かをカウントダウン、留学終了後はYour Study Abroad is already over! と表示されるようにしました。ユーザーに常に日数を意識してもらうように、ログインした後、最初の画面に表示されるようにしました。

<b>英語表現投稿機能：</b>
留学先では毎日たくさんの英語表現に触れます。日本の単語帳には絶対載っていないような現地特有のネイティブ表現やスラング表現にもたくさん出会うことになります。本アプリでは、投稿者の留学先の国や地域と英語表現を同時に見ることができます。「この国・地域ではこのような英語表現があるのか」とユーザー間で共有できたら面白いなと思って実装しました。

<b>留学先Map表示機能：</b>
Google Maps APIを使用することで投稿主の留学先がどの辺りなのかMapで分かりやすく表示されるようにしました。これによってユーザーは気になる地域・都市について簡単に調べることができます。ユーザーの利便性を考えて実装しました。

<b>投稿を全体公開にするか否か選べる機能：</b>
日記なので、自分だけが見られるように留めておきたいというユーザーもいるだろうと想定して実装しました。


## 今後の計画

- レスポンシブデザイン (UIの改善)
- 検索機能の実装 (英語日記、英語表現、ユーザー)
- 非同期いいね機能
- DM機能
- プロフィール写真を変更したらすぐさま表示 (非同期)
- いいねした人の一覧表示
- コメントの編集、削除機能
- 留学開始日終了日をカレンダーに反映
- 他人の投稿した英語表現保存機能
- 何日／何日日記を書いたかの表示 (チェックマーク表示も)

今後vueやReactといった技術にも挑戦したいと考えています！
