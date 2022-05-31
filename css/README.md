# FlOCSSについて
FLOCSS（フロックス） は、OOCSSやSMACSS、BEM、SuitCSSのコンセプトを取り入れた、モジュラーなアプローチのためのCSS構成案です。

以下に、FLOCSSを参考にした、CSS設計を提案します。

## ファイル・ディレクトリ構成
FLOCSSは次の3つのレイヤーと、Objectレイヤーの子レイヤーで構成されます。

- Foundation 　 ex reset/function/base...
- Layout 　　　 ex header/main/sidebar/footer...
- Component 　　ex title/button/form/media...
- Project 　　　ex home/news/contact...

### 具体例
```
├── 00_foundation
│   ├── _f-reset.scss　　　//リセットCSS
│   ├── _f-base.scss　　　 //ページ全体のスタイル
│   ├── _f-function.scss  //色・フォント・ブレイクポイントなどの定義
│   └── _f-display.scss   //sp・pc表示切り替え、wrapperなどのスタイル
│
├── 01_layout             //フッター、ヘッダー等のスタイル
│   ├── _l-footer.scss
│   ├── _l-header.scss
│   └── _l-sidebar.scss
│
├── 02_component           //共通パーツのスタイル
│   ├── _c-button.scss
│   ├── _c-title.scss
│   ├── _c-form.scss
│   └── _c-grid.scss
│
├── 03_project　　　　　　　 //ページ固有のスタイル
│   ├── _p-home.scss
│   ├── _p-news.scss
│   ├── _p-contact.scss
│   └── _p-recruit.scss
│
└──style.scss
```
- フォルダの順番がアルファベット順になってしまい、わかりずらいのでフォルダ名に連番をつけます。
- layoutならl-、Componentならc-のように、プレフィックスを頭につけ、ファイル名だけでもで判断しやすくします。
- 分割したscssファイルを style.scss で ＠import します。
- モジュール単位でファイルを分割することによって、ページ単位またはプロジェクト単位でのモジュールの追加・削除の管理が容易になります。

## 各フォルダーの説明
### 00_foundation
- reset.scssやbase.scssなどを用いたブラウザのデフォルトスタイルの初期化や、プロジェクトにおける基本的なスタイルを定義します。 

- ページの下地としての全体のwrapperやブレイクポイント、基本的なタイポグラフィなどが該当します。

### 01_layout
- ページを構成するヘッダーやメインのコンテンツエリア、サイドバーやフッターといったプロジェクト共通のコンテナーブロックのスタイルを定義します。

### 02_component
- 再利用できるパターンとして、小さな単位のモジュール・共通パーツのスタイルを定義します。

- 例えば、共通パーツのbutton、title、formなどが該当します。

### 03_project
- ページ固有のスタイルを定義します。


## 命名規則
### プレフィックス
レイヤーの中で分類されるモジュールに対し、役割を明確にするためにクラス名にプレフィックスをつけます。
```
フォルダー　　　　　　　　　クラス名
00_foundation - f-*    ex class="f-block-sp" / class="f-wrapper"
01_layout     - l-*    ex class="l-header"   / class="l-footer"
02_component  - c-*    ex class="c-button"   / class="c-title"
03_project    - p-*    ex class="p-home"     / class="p-news"
```

## 使用例
### ブレイクポイント
```
@include mq-max(ta) { // ウィンドウサイズが1024以下
    ~~~~
}

@include mq-min(ta) { // ウィンドウサイズが1024より上
    ~~~~
}

@include mq-max(sp) { // ウィンドウサイズが600以下
    ~~~~
}

@include mq-min(sp) { // ウィンドウサイズが600より上
    ~~~~
}
```
### インポート
```
各ファイルに接頭辞（_）をつけることで拡張子（.scssなど）を記述する必要がなくなります。style.scssで、
@import "ファイルパス";
```
