<x-layout>
    <div class="even">
        <div class="container">
            <div class="form-wrapper">
                <h1>Вход</h1>
                <form class="form-fields" action="{{ route('admin.authenticate') }}" method="post">
                    @csrf
                    <div class="label-and-input">
                        <label for="input-login" class="">Имя</label>
                        <input name="name" type="text" class="" id="input-login">
                    </div>
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <div class="label-and-input">
                        <label for="input-password" class="">Пароль</label>
                        <input name="password" type="password" class="" id="input-password">
                    </div>
                    @error('password')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="">Войти</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
