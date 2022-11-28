# アプリケーション名
飲食店予約アプリ「Rese」

<img width="1440" alt="RestaurantImage" src="https://user-images.githubusercontent.com/55370161/204184459-6b094347-59a1-4b91-bc43-319b93786b29.png">

## 説明
飲食店の予約ができるアプリ  
ユーザーは飲食店の一覧や詳細を見ることができ、会員登録すればお気に入り登録や店舗予約を行うことができる。

## 環境構築方法
1. 「git clone」などを用いてご自身の環境にコピー
2. composer update
３. .envをご自身の環境に編集
4. php artisan key:generate
5. php artisan migrate:fresh
6. php artisan db:seed
7. php artisan serve

## 利用方法
トップページにアクセスすると飲食店の一覧が表示されますので、エリアやジャンルなどで絞り込み検索をおこない行きたいお店を見つけます。  
会員登録をすれば予約ができるようになりますので店舗の詳細ページから予約してください。

## 機能一覧
- ユーザーの登録・ログイン機能  
- 飲食店のの検索・予約機能  
- お気に入り機能  

## 使用技術
### フロントエンド
- HTML  
- CSS  
- Tailwind CSS  
### バックエンド
- PHP 8.1.9  
- Laravel　8.83.25  
- mysql 8.0.30  
- composer  
