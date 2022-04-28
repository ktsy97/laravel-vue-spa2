<template>
  <div class="container mb-5">
    <!-- ユーザー名 -->
    <div class="row row-cols-1 row-cols-md-2 g-4 p-2">
      <div class="name col px-3">
        <h3>Name</h3>
      </div>
      <div class="name-value col px-3">
        <label for="inputName" class="form-label">Name</label>
        <input
          type="text"
          id="inputName"
          class="form-control mb-2"
          value="example-name"
        />
        <button class="btn btn-success">Update Name</button>
      </div>
    </div>
    <hr class="my-4" />
    <!-- ユーザーメールアドレス -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="email col px-3">
        <h3>Email</h3>
      </div>
      <div class="email-value col px-3">
        <label for="inputEmail" class="form-label">Email Address</label>
        <input
          type="email"
          id="inputEmail"
          class="form-control mb-2"
          value="email@example.com"
        />
        <button class="btn btn-success">Update Email</button>
      </div>
    </div>
    <hr class="my-4" />
    <!-- ユーザーパスワード -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="password col px-3">
        <h3>Password</h3>
      </div>
      <div class="password-value col px-3">
        <!-- 現在のパスワード -->
        <label for="inputCurrentPassword" class="form-label">Current Password</label>
        <input
          type="password"
          id="inputCurrentPassword"
          class="form-control mb-2"
          value="example-password"
        />
        <hr class="my-3" />
        <!-- 新しいパスワード -->
        <label for="inputNewPassword" class="form-label">New Password</label>
        <input
          type="password"
          id="inputNewPassword"
          class="form-control mb-2"
          value="example-password"
        />
        <!-- 新しいパスワード確認 -->
        <hr class="my-3" />
        <label for="inputConfirmPassword" class="form-label"
          >Confirm New Password</label
        >
        <input
          type="password"
          id="inputConfirmPassword"
          class="form-control mb-2"
          value="example-password"
        />
        <button class="btn btn-success">Update Password</button>
      </div>
    </div>
    <hr class="my-4" />
    <!-- アカウント削除 -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="delete col px-3">
        <h3>Delete Account</h3>
      </div>
      <div class="delete-value col px-3">
        <button
          class="btn btn-outline-danger"
          data-bs-toggle="modal"
          data-bs-target="#accountDeleteModal"
        >
          Delete Account
        </button>
        <!-- アカウント削除モーダル -->
        <div
          class="modal fade"
          id="accountDeleteModal"
          tabindex="-1"
          aria-labelledby="logoutModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
              <div class="d-flex">
                <button
                  type="button"
                  class="btn-close ms-auto"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body p-0">
                <p class="text-center">アカウントを削除しますか？</p>
                <p class="text-danger mb-1">ユーザー情報が全て失われます。</p>
                <p class="text-danger">削除処理が完了した場合、ユーザー情報の復旧はできませんのでご注意ください。</p>
                <button
                  type="button"
                  class="btn btn-secondary rounded-pill w-100 mb-1"
                  data-bs-dismiss="modal"
                >
                  キャンセル
                </button>
                <button
                  class="btn btn-danger rounded-pill w-100"
                >
                  削除する
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>
