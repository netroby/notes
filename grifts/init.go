package grifts

import (
	"github.com/gobuffalo/buffalo"
	"github.com/netroby/note-go/actions"
)

func init() {
	buffalo.Grifts(actions.App())
}
