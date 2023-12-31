

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
- Pusher

<b>デプロイ：</b>
- Heroku

## データフロー
<img src="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1699021623/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88_2023-11-03_23.26.02_brxhmh.png" width="225">

## 機能

- 英語日記投稿（表示、詳細、投稿、編集、削除）
- 英語表現投稿（表示、詳細、投稿、編集、削除）
- カウントダウン (留学開始/終了まで残り〇〇日)
- カレンダー (日記、英語表現作成日の可視化)
- Word Countの棒グラフ表示による可視化(Chart.js)
- 留学先Map表示機能 (Google Maps API)
- 翻訳機能 (DeepL API)
- ログイン
- プロフィール
- いいね
- フォロー
- コメント
- 検索機能
- ワードカウント
- DM機能 (Pusher)

## こだわり・工夫した点

<b>英語日記・表現作成日/Word Countの可視化：</b>
英語日記/表現をきちんと記録した日や自分が英語日記で何ワード書いたのかをカレンダーや棒グラフ上で可視化できるようにしました。「日記を書くとなるといつも３日坊主で結局続かないから、モチベーション維持のための可視化機能が欲しい」というユーザーからのFBをもとに実装しました。

<b>カウントダウン機能：</b>
ユーザーのモチベーションにつながるようにと実装しました。本アプリでは新規登録時に留学開始日と留学終了日を設定するのですが、留学前であれば、留学開始まで残り何日かをカウントダウン、留学中であれば、留学終了まで何日かをカウントダウン、留学終了後はYour Study Abroad is already over! と表示されるようにしました。ユーザーに常に日数を意識してもらうように、ログインした後、最初の画面に表示されるようにしました。

<b>検索機能：</b>
自分の日記は月別、公開非公開、キーワードで絞り込み検索できるようにしました。また、他人の投稿は投稿主の留学先の国、地域別に絞り込み検索できます。どこへ留学に行くか考えている人が簡単に留学先の国・地域のリアルを知ることができるようにと実装しました。

<b>留学先Map表示機能：</b>
Google Maps APIを使用することで投稿主の留学先がどの辺りなのかMapで分かりやすく表示されるようにしました。これによってユーザーは気になる地域・都市について簡単に調べることができます。ユーザーの利便性を考えて実装しました。

<b>投稿を全体公開にするか否か選べる機能：</b>
日記なので、自分だけが見られるように留めておきたいというユーザーもいるだろうと想定して実装しました。



## 今後の計画

- レスポンシブデザイン (UIの改善)
- 非同期いいね機能 (Ajax)
- テキストマイニング (API)
- 重要表現を抽出する機能
- プロフィール写真を変更したらすぐさま表示 (非同期)
- いいねした人の一覧表示
- コメントの編集、削除機能
- 他人の投稿した英語表現保存機能
- DM機能のアップデート（既読判定、削除など）
- プッシュ通知機能
- 目標達成機能（今週の目標ワード数など）
- ユーザー検索機能
- 音声録音機能（毎日お題が出されるなど）(Google Cloud Speech-to-Text)
- WordsAPIやCambridge Dictionary APIの実装


今後ReactやTypeScriptとったモダンなフロントエンド技術にも挑戦したいと考えています！
