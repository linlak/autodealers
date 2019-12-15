export const welcome = {
    template: `
    <div class="row">
      <div class="col-sm-12">
        <div class="jumbotron">
          <p>
            Welcome to Auto Dealers Uganda, Uganda's lagest Auto Directory with over 1,000 Car Bonds, Repair Shop, Washing Bays, Car Sellers and more. <span ng-if="!isUser">To get started <a ui-sref="login">Login</a> or <a ui-sref="register">Signup</a> </span>
          </p>
        </div>
      </div>
    </div>
    <div class="row clearfix">
      <div class="col-sm-12">
        <span ui-view="slider"></span>
      </div>
    </div>`
};
