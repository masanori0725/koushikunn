# koushikunn（公務員試験対策本レビューSNS　仔牛くん）
１.アプリケーションの概要
公務員試験の参考書のレビューサービスです。

２.アプリケーションの機能一覧
・認証機能
・レビュー投稿機能
・レビュー一覧機能
・レビュー詳細機能
・レビュー編集機能
・レビュー削除機能
・レビューにいいね！をする機能
・レビューにコメントをしたり、チャットする機能
・ページネーション機能

３.アプリケーション内で使用している技術一覧
・インフラ：AWS（EC2、RDS、Route53）

・EC2：php7.3のインストール、composerのインストール、GitHubからソースコードをクローン、vendorのインストール、Laravelの初期設定、nginxのインストール、RDS（MySQL）の立ち上げ

・Route53：ドメインの登録、ドメインとEC２インスタンスのIPアドレスを紐付ける

・データベース：MySQL

・デプロイのやり方
　・EC２インスタンスの立ち上げ
　・ElasticIPでIPアドレスを固定する
　・ターミナルで鍵認証を用いたSSH接続の実施
　・php7.3のインストール
　・composerのインストール
　・GitHubからソースコードをクローン
　・vendorのインストール
　・Laravelの初期設定
　・nginxのインストール
　・RDS（MySQL）インスタンスの立ち上げ
　・独自ドメインの取得
　・Route53と独自ドメインの紐付け
 
 ・CircleCI：テストの自動実行。githubにpushされた時に自動的にテストを実行するようにした。
 　CircleCIを動かそうとしたらエラーが頻発してとても苦労した。exampleTestが通らずこれを動かすのに実に１ヶ月もかかった。
  原因としてはlaravelやPHPの実装方法やエラーの対処法と比べるとCircleCIについて書かれている情報はネットで検索しても明らかに少なく、
  また載っていたとしてもある程度技術レベルのある人を前提として書かれているものが多かったので
  はじめのうちはうまく理解できず理解して自分のものにするのにすごく時間がかかってしまったから。
  例えば- run 、-command　などがインデントがずれているだけでうまく作動しないといった当たり前に思われることすらわかっていなかった。
  他にも私の場合はlaradockでlaravelの環境構築をしていたため、指定するディレクトリやファイルが下の階層にできてしまいQuiitaなどの記事で紹介されている方法通りではno such fileなどのエラーが出てしまった。
  　- command cd 〜でディレクトリを移動しなければならないという基本的なことも知らなかったのでとても時間がかかった。
  そもそも- commandでコマンドを使えるということすら理解していなかった。
　そんな中で私がもっとも苦戦したのはCircleCIでMySQLに接続してテストデータベースを起動することだった。
 　テストを実行しようにも来る日も来る日も２００２エラーや１０４５エラー、４２０００エラーをはじめとするエラーが繰り返し吐き出され、全く進捗もない日が続きとても辛かった。
  MySQLに接続できていないことだけはわかったのでなんとか接続しようと試行錯誤を続けた。
  例えばforge127.001というユーザー名に権限が与えられていないことがわかったので権限を付与しようとLaravel側がテストデータベースのマイグレーションやテスト実行時に、
  どういうユーザー名やパスワードを想定しているかを調べconfig.ymlにMySQLの環境変数を書き込んだ。
  するとようやくexampleTestが通り、CircleCIを動かすことができた。
  
 ・laradock:laravelの環境構築に使用した
 
 ・実装で最も苦労したこと：いいね機能の実装。ユーザー認証をして誰がどこのレビューにいいねしたかをDBを踏まえて実装しようとしてもなんどもエラーが出て苦しんだ。
 　それまではレビュー投稿機能、レビュー編集機能、レビュー削除機能と結構重複しているところがあったのでなんとかできたがいいね機能はそれまでの機能とは毛色が違い外付けのような感覚だった。
  　具体的なエラー内容としてはDBに接続していません、というものから始まり、migrateできないというエラーが数多くあった。
   エラーを解決する過程でそこまであまり理解していなかったMVCモデルの基礎を改めて認識することになりとても勉強になった。

