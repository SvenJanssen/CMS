<!-- Show error notification -->
{{ Notification::showError('<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Let op!</strong> :message
							</div>') }}
							
<!-- Show info notification -->
{{ Notification::showInfo('<div class="alert alert-info alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Let op!</strong> :message
							</div>') }}
							
<!-- Show warning notification -->
{{ Notification::showWarning('<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Let op!</strong> :message
							</div>') }}
							
<!-- Show success notification -->
{{ Notification::showSuccess('<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Let op!</strong> :message
							</div>') }}