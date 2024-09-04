<x-layout>
    <x-slot:title>About | Chihiro Kawase</x-slot>
    <x-slot:pageTitle>About</x-slot>

    <style>
        dd.appear {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <section class = "my-16">
        <h2 class = "text-2xl font-semibold">はじめに</h2>
        <p class = "text-xl mt-3">
            プロフィールページをご覧いただきありがとうございます。このページでは、履歴書では伝えきれない私のバックグラウンドについて、お伝えするために書いております。ぜひ、最後までご覧いただけると嬉しいです。
        </p>
    </section>

    <section class = "my-16">
        <h2 class = "text-2xl font-semibold">Profile</h2>
        <p class = "text-xl mt-8">
            はじめまして！川瀬智裕（カワセ チヒロ）と申します。私は高校在学中にアメリカの自由な学びの環境に魅力を感じ、アメリカの大学に進学することを決意しました。しかし、高額な学費が理由で両親からは反対されていました。どうしてもアメリカの大学に進学したかった私は経済的な障壁を乗り越えるために計画を立てました。
        </p>
        <p class = "text-xl mt-8">
            具体的には、日本の大学に入学して一年間の単位を取得し、その後アメリカの大学に編入することで、二年生からスタートし学費を軽減するという方法を選びました（アメリカの大学では編入が可能です）。両親と相談した結果、三年間分の学費を支援してもらえることになり、高校卒業後は通信制の大学で単位を取得しながら仕事をして貯金をすることにしました。この計画が順調に進み、2021年8月にはアイオワ州のCornell Collegeに入学することができました。
        </p>
        <p class = "text-xl mt-8">
            アメリカの大学に入学してから最初の一年はエンジニアリング（工学）を専攻し、数学や物理の授業を受けながら基礎を固めました。しかし、三年生の前期に受けたプログラミングの授業が非常に楽しく、専門的に学びたいと思い、コンピューターサイエンスに専攻を変更しました（アメリカの大学では専攻の変更が柔軟に可能です）。後期にはオブジェクト指向プログラミング、データベース、データ構造、AIについて学びました。
        </p>
        <p class = "text-xl mt-8">
            卒業まであと一年を残し、より実践的な経験を積みたいと考えた私は、長期インターンの機会を求めて日本に帰国しました。書いたコードが視覚的に反映できる点が魅力的で、現在はweb開発に強い関心を持っております。最終的にはフルスタックエンジニアとして活躍できるようになりたいです。
        </p>
    </section>

    <section class = "my-16">
        <h2 class = "text-2xl font-semibold">My Skills</h2>
        <dl class = "mt-4">
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>HTML</div>
                        <div>★★★★☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class="hidden p-10"  id="accordion-content">
                    基本的な事は一通りできます。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>CSS</div>
                        <div>★★★☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    基本的なスタイリングに加え、セレクター、フレックスボックス、メディアクエリー、アニメーションにも精通しています。tailwind cssの操作も可能です。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>JavaScript</div>
                        <div>★★★☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    基本的なDOM操作やクラスの設計ができます。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>PHP</div>
                        <div>★★★☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    基礎文法に加え、クラス設計、PDO、ウェブ開発にも精通しています。CRUD機能を持つシンプルなwebアプリケーションの作成もできます。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>Python</div>
                        <div>★★☆☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    基本的な文法は理解しているので簡単なプログラムは書けます。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>MySQL</div>
                        <div>★★★☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    基本的な事は一通りできます。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>Laravel</div>
                        <div>★★☆☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    MVC、マイグレーション、バリデーション、viteなどの機能について精通しています。このポートフォリオもLaravelで作成しています。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>Git</div>
                        <div>★★★☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    コミットやブランチの切り替え、リポジトリの操作など基本的な操作は一通りできます。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>Docker</div>
                        <div>★★★☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    Dockerコマンドの操作、イメージの作成、Dockerボリュームなどに精通しています。docker-compose.ymlの作成はできません。
                </dd>
            </div>
            <div class = "border-b border-black">
                <div class = "flex justify-between p-10 cursor-pointer" id="accordion-header">
                    <dt class = "flex justify-between w-[30%]">
                        <div>AWS</div>
                        <div>★☆☆☆☆</div>
                    </dt>
                    <span class = "duration-500 text-xl">+</span>
                </div>
                <dd class = "hidden p-10"  id="accordion-content">
                    EC2インスタンスへのログインと作業経験があります。
                </dd>
            </div>
        </dl>
        <script>
            document.querySelectorAll('#accordion-header').forEach(head => {
                head.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    content.classList.toggle('appear');
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        this.querySelector('span').classList.add('rotate-45')
                    } else {
                        content.classList.add('hidden');
                        this.querySelector('span').classList.remove('rotate-45')
                    }
                });
            });
        </script>
    </section>
</x-layout>
