### **💡 About Application**

---

<img src="https://github.com/MuhammadKhairunnasNurdin/Laravel-11_PBL/blob/master/public/img/logo_posyandu.png?raw=true" alt="Preview Image" width="500" height="350" style="display: block; margin: 0 auto;">

> The web-based Posyandu application is an application to learn more about the activities, benefits, and purposes as well as the importance of posyandu for citizens also provide many feature related employees posyandu to managing health and other checkup for citizens

---

### **Tech Stack:**

---

- **[Backend]: [Laravel _11.13.*_](https://laravel.com/docs/11.x)**
- **[Frontend]: [Laravel Blade](https://laravel.com/docs/11.x/blade#main-content), [Tailwind](https://tailwindcss.com/docs/installation), [Flowbite](https://flowbite.com/docs/getting-started/laravel/), [Inertia-React](https://inertiajs.com/client-side-setup), [Typescript](https://www.typescriptlang.org/download/)**
- **[Database]: [Mysql _8.0._](https://dev.mysql.com/doc/refman/8.0/en/)**
- **(OPTIONAL)->[Containerization]: [DOCKER](https://docs.docker.com/desktop/)**

---

### **Software Requirement:**

---

-   **[Code Management]: [Git](https://git-scm.com/downloads) and [GitHub](https://github.com)**
-   **[PHP Environment]: [PHP _8.3.*_](https://www.php.net/downloads.php) and [Composer _2.7.*_](https://getcomposer.org/download/)**
-   **[JS Environment]: [NodeJS _20.15.*_](https://nodejs.org/en/download/current)**
-   **(ALTERNATIVE)->[PHP and JS (bundling) Environment]: [Laravel Herd (windows and mac only)](https://herd.laravel.com/docs/windows/1/getting-started/installation) or [Laragon(windows only)](https://laragon.org/download/)** 
-   **(OPTIONAL)->[Backend Testing]: [Insomnia](https://docs.insomnia.rest/insomnia/install) or [Thunderclient(VScode Extension)](https://www.thunderclient.com/)**

---

### **🙇 Previous Team:**

---

-   [Aunurofiq Farhan Zuhdi](https://github.com/Aunurrofiq08)
-   [Lukman Eka Septiawan](https://github.com/Lukman289)
-   [Reza Arya Wijaya](https://github.com/chocomaltt)
-   [Muhammad Rizky Fauzi](https://github.com/rizkyyfaauzi21) <br>
    <b>Thanks for 4 people that help build this wonderfully website, from here We will upgrade that<b>
    
---

### **🙇 Current Team:**

---

- [Muhammad Khairunnas Nurdin](https://github.com/MuhammadKhairunnasNurdin)
- [Reza Arya Wijaya](https://github.com/chocomaltt)

---

### **🕙 Installation:**

---

1. Open Address repository: [Repository GitHub](https://github.com/MuhammadKhairunnasNurdin/Laravel-11_PBL)

2. Fork repository:

    - Search Fork in right corner of repo and click
    - Click Create Fork in bottom, make sure you uncheck the Copy the master branch only
    - If in your repository had fork from above repository address, your fork process is success

3. Clone fork repository:
    - clone using HTTPS
    ```bash
    git clone https://github.com/Your_Github_Username/Laravel-11_PBL
    ```
    - clone using SSH
    ```bash
    git clone git@github.com:Your_Github_Username/Laravel-11_PBL
    ```

   note: change "Your_GitHub_Username" with your actual username, like: MuhammadKhairunnasNurdin

4. Enter path folder repository:

    ```bash
    cd Laravel-11_PBL
    ```

5. Install dependency:

    ```bash
    composer install
    npm install
    ```

6. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

7. Generate key:

    ```bash
    php artisan key:generate
    ```
   
8. Fill DEFAULT_USER_PASSWORD in `.env` file with default password in your application:

    ```bash
    DEFAULT_USER_PASSWORD=your_password
    ```

    note: change "your_password" with your actual default password

9. Create new Database `laravel_11_pbl` (match the database name in the file `.env`) in phpmyadmin or terminal:

    ```bash
    mysql -u root -p
    create database laravel_11_pbl;
    exit;
    ```

10. Migrate and Seeding database:

     ```bash
     php artisan migrate --seed
     ```

11. run local server:

    - run Laravel Server:
     ```bash
     php artisan serve
     ```
    - run NPM dev:
     ```bash
     npm run dev
     ```

12. Open browser and Access Localhost `http://localhost:8000` (for Laravel Server) or `http://localhost/www/Laravel-11_PBL` (for Laragon Server)

#### note: for steps 2-11 or any of steps that using bash or command syntax, you can do those bash syntax in your terminal or IDE-integrated terminal ####

---

### **🕙 Project Collaboration:**

---

1. Sync Your Fork repository:

   You can click in middle top right in Your GitHub repository: Laravel-11_PBL

2. fetch change from your fork to local remote:

   ```bash
   git fetch origin
   ``` 
   with this syntax, will update local remote to match updated fork
   if after this not show up which branch that updated, that mean your local remote is updated

3. if fetch is show updated branch:

   go to which branch that updated
   ```bash
   git switch frontend
   ```
   or
    ```bash
   git switch backend
   ```
   or
    ```bash
   git switch Other_Branch
   ```

   note: change "Other_Branch" with your branch that existed in origin remote

4. Pull code change in updated branch:

   ```bash
   git pull
   ```

5. Create your code change

6. Add to staging index your change:

   ```bash
   git add .
   ```

7. Commit change:

   ```bash
   git commit -m "commit message"
   ```

   Note: for conventional commit message you can follow this rule:
   #### Conventional Commit Messages
   See how a [minor change](#examples) to your commit message style can make a difference.

   **ℹ️ [git-conventional-commits](https://github.com/qoomon/git-conventional-commits)**  A CLI util to ensure these conventions and generate changelogs

    <img src="https://img.icons8.com/dusk/1600/commit-git.png" width="200" height="200"  alt=""/>

   ##### Commit Message Formats

   ###### Default
    <pre>
    <b><a href="#types">&lt;type&gt;</a></b>(<b><a href="#scopes">&lt;optional scope&gt;</a></b>): <b><a href="#description">&lt;description&gt;</a></b>
    <sub>empty separator line</sub>
    <b><a href="#body">&lt;optional body&gt;</a></b>
    <sub>empty separator line</sub>
    <b><a href="#footer">&lt;optional footer&gt;</a></b>
    </pre>

   ###### Types
    * `feat` Commits, that adds or remove a new feature
    * `fix` Commits, that fixes a bug
    * `refactor` Commits, that rewrite/restructure your code, however does not change any API behaviour
        * `perf` Commits are special
        * `refactor` commits, that improve performance
    * `style` Commits, that do not affect the meaning (white-space, formatting, missing semicolons, etc.)
    * `test` Commits, that add missing tests or correcting existing tests
    * `docs` Commits, that affect documentation only
    * `build` Commits, that affect build components like build tool, ci pipeline, dependencies, project version, ...
    * `ops` Commits, that affect operational components like infrastructure, deployment, backup, recovery, ...
    * `chore` Miscellaneous commits e.g. modifying `.gitignore`

   ###### Scopes
   The `scope` provides additional contextual information.
    * Is an **optional** part of the format
    * Allowed Scopes depends on the specific project
    * Don't use issue identifiers as scopes

   ###### Breaking Changes Indicator
   Breaking changes should be indicated by an `!` before the `:` in the subject line e.g. `feat(api)!: remove status endpoint`
    * Is an **optional** part of the format

   ###### Description
   The `description` contains a concise description of the change.
    * Is a **mandatory** part of the format
        * Use the imperative, present tense: "change" not "changed" nor "changes"
        * Think of `This commit will...` or `This commit should...`
        * Don't capitalize the first letter
        * No dot (`.`) at the end

   ###### Body
   The `body` should include the motivation for the change and contrast this with previous behavior.
    * Is an **optional** part of the format
        * Use the imperative, present tense: "change" not "changed" nor "changes"
        * This is the place to mention issue identifiers and their relations

   ###### Footer
   The `footer` should contain any information about **Breaking Changes** and is also the place to **reference Issues** that this commit refers to.
    * Is an **optional** part of the format
        * **optionally** reference an issue by its id.
        * **Breaking Changes** should start with the word `BREAKING CHANGES:` followed by space or two newlines. The rest of the commit message is then used for this.

   ###### Examples
    * ```
        feat: add email notifications on new direct messages
        ```
    * ```
        feat(shopping cart): add the amazing button
        ```
    * ```
        feat!: remove ticket list endpoint
    
        refers to JIRA-1337
    
        BREAKING CHANGES: ticket enpoints no longer supports list all entites.
        ```
    * ```
        fix(api): handle empty message in request body
        ```
    * ```
        fix(api): fix wrong calculation of request body checksum
        ```
    * ```
        fix: add missing parameter to service call
    
        The error occurred because of <reasons>.
        ```
    * ```
        perf: decrease memory footprint for determine uniqe visitors by using HyperLogLog
        ```
    * ```
        build: update dependencies
        ```
    * ```
        build(release): `bump version to 1.0.0
        ```
    * ```
        refactor: implement fibonacci number calculation as recursion
        ```
    * ```
        style: remove empty line
        ```

8. Push change to fork related branch that your updated and don't push to master like 'git push origin master', or you blocked by rule (always check branch with steps 3, so push will hit remote branch that role rule targeted):

   ```bash
   git push
   ```

9. Do Pull Request from your fork to main repository to discuss the change with your team:
    - Open your fork in your repository, if in there has notification to compare and pull request hit that button in there
    - Create pull request from your fork to main repository related branch which your updated(like from frontend fork to frontend main repo)

10. (Optional) if when pull had problem with "merge using **ort** strategy", like merge commit with no actual changes make your work tree dirty, do this:
    ```bash
    git config pull.ff only
    ``` 
    Note: if there is error when pull, because git config pull.ff=only, do this:
     ```bash
     git config pull.rebase false
     ```

---

### **🗒 Note :**

---

-   If there are update change in your fork, always synced that, because you cannot push and create pull request without that
-   When Checkout, Push or Pull, always check your git branch is related to your Role
-   Don't push to master with 'git push origin master' when add code change to GitHub
-   Always create Pull request like steps 9
-   if in Discord that connected with webhook had notify about pull request, you can join discussion and review your teams code 


