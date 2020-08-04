# README
- URL: http://healthylife-app.site/


## サービス概要
- 食事で摂取した栄養を記録し、管理できるサービスです
- 健康的な食生活を送るために、みんなのおすすめレシピを共有できます


## できること

- ユーザー登録、編集、削除
- レシピの投稿、編集、削除
- レシピ検索
- ハッシュタグ、タグ検索
- お気に入り登録
- コメント
- BMI値をグラフで管理
- １週間分の摂取した栄養素を表に出力した数値で確認できる


## アカウント

- Eメールアドレス：gest@gest.com
- パスワード：gestgest

## サービスイメージ

### トップ画面

- 新着レシピ一覧
![healthylifeimage1](https://user-images.githubusercontent.com/59483718/89257342-eecf7800-d660-11ea-8c5b-9546cd464ff8.jpg)

- ユーザーマイページ
![healthylifeimage2](https://user-images.githubusercontent.com/59483718/89257010-4e795380-d660-11ea-92f4-19b2fb2beda1.jpg)


- グラフによるBMI値管理
<img width="717" alt="bmi-graph-image" src="https://user-images.githubusercontent.com/59483718/89257091-7799e400-d660-11ea-84c3-def354b38dc2.png">


- 摂取栄養素の視覚化
<img width="903" alt="ate-graph-image" src="https://user-images.githubusercontent.com/59483718/89257072-6cdf4f00-d660-11ea-9cd1-29545642317e.png">


## 実装した機能

- Dockerdでのローカル環境構築
- レスポンシブ対応
- seedsを使用したCSVファイルデータのテーブル作成
- chart.jsによるグラフ表示
- Vue.jsによるいいねボタン
- Vue.jsによるインクリメンタルサーチ
- jQueryを用いた画像保存前プレビュー
- jQueryを用いた削除前、退会前のアラート表示
- AWS(ECR,ECS,RDS)でのデプロイ
- 画像ストレージにS3を設定
- route53による独自ドメインの設定
- ページネーション
- アイコン未登録時の表示設定

## 使用した言語

- PHP(Laravel)、HTML、CSS、javascript(Vue.js,jQuery,chart.js)

## 今後実装したい機能、改善点

- レシピの人気ランキング表示
- 人気ハッシュタグの表示
- コメント通知機能
- CSVファイルの食材名のデータ編集