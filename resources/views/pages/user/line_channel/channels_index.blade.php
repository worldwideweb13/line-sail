@extends('layouts.app')

@section('content')
<h5 class="text-center">登録チャンネル一覧</h5>

<div class="mt-3 list-group list-group-flush">
    <table class="table table-borderless table-hover">
        <thead>
            <tr style="border-bottom: 1.4px solid; border-color: #ced1d3;">
                <th scope="col" class="font-weight-normal">No</th>
                <th scope="col" class="font-weight-normal">チャンネル名</th>
                <th scope="col" class="font-weight-normal">作成日</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $lineChannels as $lineChannel )
                <tr>
                    <th scope="row">{{ $lineChannel->id }}</th>
                    <td>{{ $lineChannel->line_channel_name }}</td>
                    <td>{{ $lineChannel->created_at->format('Y.m.d') }}</td>
                    <td>
                        <a class="btn btn btn-outline-success" href="{{ route('user.lineChannel.edit', $lineChannel->id) }}">編集</a>
                        <a class="btn btn-outline-danger btn-delete" data-toggle="modal" data-target="#deleteModal" data-action-url="{{ route('user.lineChannel.destroy', $lineChannel->id) }}">削除</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3 d-flex justify-content-center">
        {{ $lineChannels->links() }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">削除しますか?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    削除したチャンネルはLine Developer上には残ります。完全に削除する場合は、Line Developerのチャンネルも削除してください。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">キャンセル</button>
                    <form id="destroy-form" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('script')
<script type="module">
    $('.btn-delete').click(function (e) {
        $('#destroy-form').attr('action', $(this).data('action-url'));
    });
</script>
@endsection
